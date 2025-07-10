$('#projectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var title = button.data('title');
    var description = button.data('description');
    var image = button.data('image');
    var members = button.data('members');
    var video = button.data('video');

    var modal = $(this);
    modal.find('.modal-title').text(title);
    modal.find('#projectDescription').text(description);
    modal.find('#projectImage').attr('src', image);
    modal.find('#projectVideo').attr('href', video);
  });
