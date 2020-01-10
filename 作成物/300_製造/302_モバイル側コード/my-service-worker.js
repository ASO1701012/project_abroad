// const version = 'v1';
//
// // インストール時にキャッシュする
// self.addEventListener('install', (event) => {
//     console.log('service worker install ...');
//
//     // キャッシュ完了までインストールが終わらないように待つ
//     event.waitUntil(
//         caches.open('v1').then((cache) => {
//             return cache.addAll([
//                 './',
//                 './js/bootstrap.bundle.js',
//                 './js/bootstrap.js',
//                 './js/jQuery-3.3.1.min.js',
//                 './inc/database_access.php',
//                 './inc/db_connect.php',
//                 './inc/G-00-00-foot.php',
//                 './inc/G-00-00-head.php',
//                 './inc/mySet.php',
//                 './img/country',
//                 './img/country_about',
//                 './css/bootstrap.css',
//                 './css/bootstrap-grid.css',
//                 './css/bootstrap-reboot.css',
//                 './css/G-00.css',
//                 './css/G-01.css',
//                 './css/G-04.css',
//                 './css/G-05.css',
//                 './css/G-06.css',
//                 './css/G-07.css',
//                 './css/G-08.css',
//                 './controller/session_auth.php',
//                 './G-08-01.php',
//                 './G-08-02.php',
//                 './G-08-03.php',
//                 './G-08-04.php',
//             ]);
//         })
//     );
// });
//
//
// self.addEventListener('activate', (event) => {
//     console.info('activate', event);
// });
//
// self.addEventListener('fetch', function(event) {
//     console.log('fetch', event.request.url);
//
//     event.respondWith(
//         // リクエストに一致するデータがキャッシュにあるかどうか
//         caches.match(event.request).then(function(cacheResponse) {
//             // キャッシュがあればそれを返す、なければリクエストを投げる
//             return cacheResponse || fetch(event.request).then(function(response) {
//                 return caches.open('v1').then(function(cache) {
//                     // レスポンスをクローンしてキャッシュに入れる
//                     cache.put(event.request, response.clone());
//                     // オリジナルのレスポンスはそのまま返す
//                     return response;
//                 });
//             });
//         })
//     );
// });