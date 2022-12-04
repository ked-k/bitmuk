/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/assets/js/profile.js ***!
  \****************************************/
$(document).on('click', '.edit-profile', function (event) {
  $('#pfUserId').val(loggedInUser.id);
  $('#pfName').val(loggedInUser.name);
  $('#pfEmail').val(loggedInUser.email);
  $('#EditProfileModal').appendTo('body').modal('show');
});
$(document).on('change', '#pfImage', function () {
  var ext = $(this).val().split('.').pop().toLowerCase();

  if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
    $(this).val('');
    $('#editProfileValidationErrorsBox').html('The profile image must be a file of type: jpeg, jpg, png.').show();
  } else {
    displayPhoto(this, '#edit_preview_photo');
  }
});

window.displayPhoto = function (input, selector) {
  var displayPreview = true;

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var image = new Image();
      image.src = e.target.result;

      image.onload = function () {
        $(selector).attr('src', e.target.result);
        displayPreview = true;
      };
    };

    if (displayPreview) {
      reader.readAsDataURL(input.files[0]);
      $(selector).show();
    }
  }
};

$(document).on('submit', '#editProfileForm', function (event) {
  event.preventDefault();
  var userId = $('#pfUserId').val();
  var loadingButton = jQuery(this).find('#btnPrEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: '/admin/update',
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        iziToast.success({
          message: 'Successfully update profile',
          position: 'topRight'
        });
        $('#EditProfileModal').modal('hide');
        setTimeout(function () {
          location.reload();
        }, 1500);
      }
    },
    error: function error(result) {
      console.log(result);
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
$(document).on('submit', '#changePasswordForm2', function (event) {
  event.preventDefault();
  var loadingButton = jQuery(this).find('#btnPrPasswordEditSave');
  loadingButton.button('loading');
  $.ajax({
    url: '/admin/update/password',
    type: 'post',
    data: new FormData($(this)[0]),
    processData: false,
    contentType: false,
    success: function success(result) {
      if (result.success) {
        iziToast.success({
          message: 'Successfully update password',
          position: 'topRight'
        });
        $('#EditProfileModal').modal('hide');
        setTimeout(function () {
          location.reload();
        }, 1500);
      }
    },
    error: function error(result) {
      iziToast.warning({
        message: 'Password dose not matched',
        position: 'topRight'
      });
    },
    complete: function complete() {
      loadingButton.button('reset');
    }
  });
});
/******/ })()
;