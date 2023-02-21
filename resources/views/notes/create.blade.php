<!-- 新規作成 -->
<x-app-layout>
  <div class="py-12">
      <div class="max-w-xl mx-auto px-2 sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <header>
                    <!-- 見出し -->
                    <h2 class="text-xl font-bold">新規作成</h2>
                  </header>
                  <!-- 新規作成フォーム -->
                  <form method="post" action="{{ route('notes.store')}}" class="space-y-4">
                    @csrf
                    <!-- メモタイトル -->
                    <div>
                      <label for="note_title" class="text-gray-700">タイトル</label>
                      <input type="text" name="note_title" id="note_title" class="w-full border border-gray-300 shadow-sm rounded"/>
                    </div>
                    <!-- メモ本文 -->
                    <div>
                      <label for="note_content" class="text-gray-700">メモ</label>
                      <textarea name="note_content" id="note_content" class="w-full border border-gray-300 shadow-sm rounded"></textarea>
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