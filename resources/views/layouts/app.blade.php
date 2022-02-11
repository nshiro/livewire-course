<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>タイトル</title>
@livewireStyles
<script src="https://cdn.tailwindcss.com"></script>
<script defer src="https://unpkg.com/alpinejs@3.8.1/dist/cdn.min.js"></script>
<style>
input, textarea {
 border: 1px solid gray;
 padding: 4px !important;
}
input[type=submit], input[type=button] {
  padding: 4px !important;
  cursor: pointer;
}
td {
  border:1px solid gray; padding:3px;
}
h1 {
  font-size: 40px !important;
}
.status {
  font-size: 18px;
  font-weight: bold;
  color: blue;
}
/* Pagination 用 */
span[aria-current=page] > span {
  color: white;
  background-color: green !important;
}
</style>
</head>
<body>

{{ $slot }}

@livewireScripts

<script>
// デフォルトの「This page has expired...」 の表示をカスタマイズする
// 「キャンセル」した際、onPageExpired() を使った方式だと1回しか聞かれないので、
// 従来からの onError() を使った方が良いのかも知れない。

// Ver.2.9.0 以降で使える
// 参考：https://laravel-livewire.com/docs/2.x/deployment#page-expired-dialog-and-hook
Livewire.onPageExpired((response, message) => {
  confirm('ページの有効期限が過ぎました。画面をリフレッシュしますか？') && window.location.reload();
});

// 従来版
// window.livewire.onError(statusCode => {
//   if (statusCode === 419) {
//     confirm('ページの有効期限が過ぎました。画面をリフレッシュしますか？') && window.location.reload();
//     return false;
//   }
// });
</script>

@stack('js')

</body>
</html>