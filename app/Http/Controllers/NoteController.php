<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::where('user_id', '=', Auth::id()) // メモのユーザーidと現在ログインしているユーザーのidが一致したメモを取得
                    ->orderBy('updated_at', 'desc')      // 更新日が新しい順にソート
                    ->simplePaginate(10);                // ページネーション

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // createビューを返す
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNoteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
        // Noteモデルをインスタンス化
        $note = new Note;

        // requestで取得した属性をセット
        $note->note_title = $request->note_title;
        $note->note_content = $request->note_content;
        // 現在ログインしているユーザーidをセット
        $note->user_id = Auth::id();

        $note->save();

        return redirect()->route('notes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        // 現在ログイン中のユーザーのみアクセスできるようにする
        if($note->user_id === Auth::id()){
            // 成功時は閲覧画面へ
            return view('notes.show', compact('note'));
        } else {
            // 失敗時はリダイレクトする
            return redirect()->route('notes.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        // 現在ログイン中のユーザーのみアクセスできるようにする
        if($note->user_id === Auth::id()){
            // 成功時は編集画面へ
            return view('notes.edit', compact('note'));
        } else {
            // 失敗時はリダイレクトする
            return redirect()->route('notes.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNoteRequest  $request
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        // 現在ログイン中のユーザーのみアクセスできるようにする
        if($note->user_id === Auth::id()){
            // メモタイトルを更新
            $note->note_title = $request->note_title;
            // メモ本文を更新
            $note->note_content = $request->note_content;
            // 保存（created_atとupdated_atが更新される）
            $note->save();

            return redirect()->route('notes.index');
        } else {
            // 失敗時はリダイレクトする
            return redirect()->route('notes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        // 現在ログイン中のユーザーのみアクセスできるようにする
        if($note->user_id === Auth::id()){
            // メモを削除
            $note->delete();

            return redirect()->route('notes.index');
        } else {
            // 失敗時はリダイレクトする
            return redirect()->route('notes.index');
        }
    }
}
