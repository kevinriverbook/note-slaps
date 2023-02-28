<!-- メモ一覧 -->
<x-app-layout>
  <div class="py-12">
      <div class="max-w-xl mx-auto px-2 sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <header>
                    <!-- 見出し -->
                    <h2 class="text-xl font-bold">メモ一覧</h2>
                  </header>
                  <!-- メモ一覧テーブル -->
                  <div class="mt-2 space-y-4 w-full mx-auto overflow-auto">
                    <table class="table-auto w-full text-left whitespace-nowrap">
                      <thead class="text-gray-700">
                        <tr class="flex justify-between">
                          <th class="text-lg dark:text-gray-300">タイトル</th>
                          <th></th>
                        </tr>
                      </thead>
                      @foreach ($notes as $note)
                        <tbody>
                          <tr class="flex justify-between">
                            <!-- メモタイトル -->
                            <td>{{$note->note_title}}</td>
                            <!-- メモ操作 -->
                            <td class="flex justify-start gap-2">
                              <!-- メモ閲覧ボタン -->
                              <a href="{{ route('notes.show', $note->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                              </a>
                              <!-- メモ編集ボタン -->
                              <a href="{{ route('notes.edit', $note->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-blue-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                              </a>
                              <!-- メモ削除ボタン -->
                              <form method="POST" action="{{ route('notes.destroy', $note->id) }}">
                                @csrf
                                <!-- 疑似フォームメソッド -->
                                @method('DELETE')
                                <button type="submit" class="block">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                  </svg>
                                </button>
                              </form>
                            </td>
                          </tr>
                        </tbody>
                      @endforeach
                    </table>
                    <!-- ページネーション -->
                    <!-- hasPages()の判定でページネーションが存在しない場合、空divタグを表示させない -->
                    @if ($notes->hasPages())
                      <div>{{ $notes->links() }}</div>
                    @endif
                    <!-- 新規作成ボタン -->
                    <button class="px-3 py-2 text-white font-bold bg-blue-500 rounded">
                      <a href="{{ route('notes.create') }}">新規作成</a>
                    </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>