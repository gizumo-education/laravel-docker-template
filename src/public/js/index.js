$(function() {
  const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

  $(".todo-status-button").change(function () {
    const content = $(this).val();
    const url = $(this).parent(".todo-status-form").attr("action");

    $.ajax(
      url,
      {
        type: 'POST',
        headers: { 'X-CSRF-TOKEN': csrfToken }
      }
    )
    .done(function(data) {

        // 確認！
        console.log(data);

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