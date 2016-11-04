<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\FanoutEvent;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($channel)
    {
        return view('form', ['channel' => $channel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $channel)
    {
        $message = $request->all();

        $muid = $message['muid'];

        $message_arr = array(
            'title' => $message['title'],
            'body' => $message['body']
        );

        if ($muid != '') {

            $row_arr = array(
                'channel' => $channel,
                'muid' => $muid
            );
            DB::table('messages')
                ->where([
                    array('channel','=', $channel),
                    array('muid', '=', $muid)
                    ])
                ->update($message_arr);

            $message_arr = array_merge($message_arr, $row_arr, array('action' => 'update'));
        } else {

            $message_arr_add = array(
                'channel' => $channel,
                'muid' => uniqid(),
                'time' => time()
            );
            $message_arr = array_merge($message_arr, $message_arr_add);

            DB::table('messages')
                ->insert($message_arr);

            $message_arr = array_merge($message_arr, array('action' => 'add'));
        }

        $message = json_encode($message_arr);
        event(new FanoutEvent($channel, $message));

        return array('status' => 'ok', 'message' => $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the Messages in a Channel.
     *
     * @param  string  $channel
     * @return \Illuminate\Http\Response
     */
    public function showAllByChannel($channel)
    {
        $messages = DB::table('messages')
            ->where('channel', $channel)
            ->get();
        return $messages;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($channel, $muid)
    {

        DB::table('messages')
            ->where([
                array('channel','=', $channel),
                array('muid', '=', $muid)
                ])
            ->delete();
        $message_arr = array(
            'muid' => $muid,
            'action' => 'delete'
        );
        $message = json_encode($message_arr);
        event(new FanoutEvent($channel, $message));

        return array('status' => 'ok', 'message' => $message_arr);
    }
}
