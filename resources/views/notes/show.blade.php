<!-- メモ閲覧 -->
<x-app-layout>
  <div class="py-12">
      <div class="max-w-xl mx-auto px-2 sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <header>
                    <!-- 見出し -->
                    <h2 class="text-xl font-bold">メモ閲覧</h2>
                  </header>
                  <!-- メモ閲覧 -->
                  <div class="mt-4 space-y-3">
                    <!-- メモタイトル -->
                    <div>
                      <h3 class="text-gray-700 dark:text-gray-300 font-bold">タイトル</h3>
                      <p class="break-all">{{ $note->note_title }}</p>
                    </div>
                    <!-- メモ本文 -->
                    <div>
                      <h3 class="text-gray-700 dark:text-gray-300 font-bold">メモ</h3>
                      <p class="break-all">{{ $note->note_content }}</p>
                    </div>
                    <!-- 作成日 -->
                    <div>
                      <h3 class="text-gray-700 dark:text-gray-300 font-bold">作成日</h3>
                      <p>{{ $note->created_at->format('Y/m/d') }}</p>
                    </div>
                    <!-- 更新日 -->
                    <div>
                      <h3 class="text-gray-700 dark:text-gray-300 font-bold">更新日</h3>
                      <p>{{ $note->updated_at->format('Y/m/d') }}</p>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>