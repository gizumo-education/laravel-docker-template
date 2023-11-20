$(function() {
  //HTML内にセットされているCSRFトークンを取得
  //HTMLのヘッダのメタの所にある
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  //todo-status-buttonというクラスが降られたタグに変化があったときに処理を実行する
  $(".todo-status-button").change(function () {
    //$(this)は変更されたチェックボックスのタグの事

    //変更されたチェックボックスのタグのvalue属性の値を取得して代入
    const content = $(this).val();

    //上記のチェックボックスの親要素のtodo-status-formのaction属性の値を取得、代入
    const url = $(this).parent(".todo-status-form").attr("action");

    //非同期通信用の記述
    $.ajax(
      url,
      {
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken }
      }
    )
    .done(function(data) {
      if (data.is_completed) {
        window.alert('「' + content + '」のToDoを完了にしました。');
      } else {
        window.alert('「' + content + '」のToDoの完了を取り消しました。');
      }
    })
    .fail(function() {
      window.alert('通信に失敗しました。');
    });
  });
});