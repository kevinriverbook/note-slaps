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
                  <form class="space-y-4">
                    <!-- メモタイトル -->
                    <div>
                      <label class="text-gray-700">タイトル</label>
                      <input class="w-full border border-gray-300 shadow-sm rounded"/>
                    </div>
                    <!-- メモ本文 -->
                    <div>
                      <label class="text-gray-700">メモ</label>
                      <textarea class="w-full border border-gray-300 shadow-sm rounded"></textarea>
                    </div>
                    <!-- 送信ボタン -->
                    <div>
                      <button class="p-2 bg-blue-500 text-white font-bold rounded">保存</button>
                    </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>