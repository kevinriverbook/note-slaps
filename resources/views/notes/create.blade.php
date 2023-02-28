<!-- メモ新規作成 -->
<x-app-layout>
  <div class="py-12">
      <div class="max-w-xl mx-auto px-2 sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <header>
                    <!-- 見出し -->
                    <h2 class="text-xl font-bold">メモ新規作成</h2>
                  </header>
                  <!-- エラーメッセージ -->
                  @if ($errors->any())
                    <div class="mt-4 mb-4">
                      <div class="text-red-600">
                        エラー
                      </div>
                      <ul class='text-sm text-red-600 dark:text-red-400 space-y-1'>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div>
                  @endif
                  <!-- 新規作成フォーム -->
                  <form method="POST" action="{{ route('notes.store')}}" class="space-y-4">
                    @csrf
                    <!-- メモタイトル -->
                    <div>
                      <label for="note_title" class="font-medium text-sm text-gray-700 dark:text-gray-300">タイトル</label>
                      <input type="text" name="note_title" id="note_title" value="{{ old('note_title') }}" class="mt-1 w-full dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm" />
                    </div>
                    <!-- メモ本文 -->
                    <div>
                      <label for="note_content" class="font-medium text-sm text-gray-700 dark:text-gray-300">メモ</label>
                      <textarea name="note_content" id="note_content" class="mt-1 w-full dark:bg-gray-900 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm">{{ old('note_content') }}</textarea>
                    </div>
                    <!-- 送信ボタン -->
                    <div>
                      <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-bold rounded">保存</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>