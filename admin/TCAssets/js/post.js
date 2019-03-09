var post = {
  ajaxMethod: 'POST',

  add: function () {
    var formData = new FormData();
    formData.append('title', $('#formTitle').val());
    formData.append('content', $('.redactor-editor').html());
    //
    $.ajax({
      url: '/admin/posts/add/',
      type: this.ajaxMethod,
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function () {
      },
      success: function (result) {
        window.location = '/admin/posts/edit/' + result;
      }
    });
  },
  update: function () {
    var formData = new FormData();
    formData.append('post_id', $('#formPostId').val());
    formData.append('title', $('#formTitle').val());
    formData.append('content', $('.redactor-editor').html());
    //
    $.ajax({
      url: '/admin/posts/update/',
      type: this.ajaxMethod,
      data: formData,
      processData: false,
      contentType: false,
      beforeSend: function () {
      },
      success: function (result) {
        console.log(result);
      }
    });
  }
};