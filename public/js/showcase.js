function updatePurchaseButtons() {
  $('.btn-action[data-project-id]').each(function () {
    var button = $(this);
    var projectId = button.data('project-id');

    // Show loading state
    button.html('<i class="fas fa-spinner fa-spin"></i> Checking...');
    button.prop('disabled', true);

    $.ajax({
      url: '/check-purchase/' + projectId,
      method: 'GET',
      dataType: 'json'
    })
      .done(function (response) {
        button.prop('disabled', false);
        if (response.purchased) {
          button.removeClass('btn-secondary btn-warning')
            .addClass('btn-info')
            .html('<i class="fas fa-download"></i> Download')
            .attr('onclick', 'window.location.href="/download-project/' + projectId + '"')
            .removeAttr('data-toggle data-target');
        } else {
          button.removeClass('btn-secondary btn-info')
            .addClass('btn-warning')
            .html('<i class="fas fa-shopping-cart"></i> Purchase')
            .attr({
              'data-toggle': 'modal',
              'data-target': '#purchaseModal'
            })
            .removeAttr('onclick')
            .off('click')
            .on('click', function (e) {
              e.preventDefault();
            });
        }
      })
      .fail(function () {
        console.error('Failed to check purchase status for project ' + projectId);
        button.removeClass('btn-secondary btn-warning btn-info')
          .addClass('btn-danger')
          .html('<i class="fas fa-exclamation-circle"></i> Error')
          .prop('disabled', false);
      });
  });
}

$(document).ready(function () {
  // Initialize buttons
  updatePurchaseButtons();

  // Refresh balance display
  function refreshBalance() {
    if ($('#userBalance').length) {
      $.ajax({
        url: '/get-current-balance',
        method: 'GET',
        dataType: 'json'
      }).done(function (data) {
        $('#userBalance').text(data.balance);
      });
    }
  }
  refreshBalance();

  // Rest of your code remains the same...
  // Project Modal Handler
  $('#projectModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    $(this).find('#projectTitle').text(button.data('title'));
    $(this).find('#projectDescription').text(button.data('description'));
    $(this).find('#projectCredit').text(button.data('credit'));
    $(this).find('#projectAuthor').text(button.data('author'));
    $(this).find('#projectCreatedAt').text(button.data('created-at'));
    $(this).find('#projectCategory').text(button.data('category'));
    $(this).find('#projectImage').attr('src', button.data('image'));

    ['video', 'demo'].forEach(function (type) {
      var link = button.data(type);
      var btn = $(this).find('#project' + type.charAt(0).toUpperCase() + type.slice(1) + 'Link');
      link && link !== '#' ? btn.attr('href', link).show() : btn.hide();
    }.bind(this));
  });

  // Purchase Modal Handler
  $(document).on('show.bs.modal', '#purchaseModal', function (event) {
    var button = $(event.relatedTarget);

    if (!button.hasClass('btn-action')) {
      button = button.closest('.btn-action');
    }

    console.log('Purchase modal triggered by:', button);
    console.log('Button data attributes:', {
      price: button.data('price'),
      projectId: button.data('project-id')
    });

    $('#projectPrice').val(button.data('price'));
    $('#modalProjectId').val(button.data('project-id'));
    refreshBalance();
  });

  // Handle purchase form submission
  $('#purchaseForm').submit(function (e) {
    e.preventDefault();
    var form = $(this);
    var submitButton = form.find('button[type="submit"]');
    var projectId = $('#modalProjectId').val();

    submitButton.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');

    $.ajax({
      type: 'POST',
      url: form.attr('action'),
      data: form.serialize(),
      success: function (response) {
        if (response.success) {
          $('#purchaseModal').modal('hide');
          refreshBalance();
          updatePurchaseButtons();
          alert('Purchase successful! You can now download the project.');
        } else {
          alert(response.message);
        }
      },
      error: function (xhr) {
        alert(xhr.responseJSON?.message || 'Error occurred during purchase');
      },
      complete: function () {
        submitButton.prop('disabled', false).html('Purchase');
      }
    });
  });
});