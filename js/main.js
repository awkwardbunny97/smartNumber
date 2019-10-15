function send_sq(){
  var user_id = $('#cus_id_js').val();
  var key_sq = $('#key_sq').val();
  var store_code_sq = 'SQ_' + $('#store_code').val();

  $.ajax({
    url: 'js/sq.php',
    method: "POST",
    data: {
      "id": user_id,
      "key_sq": key_sq,
      "store_code_sq": store_code_sq
    }
  }).success(
    alert("Gửi tin nhắn thành công!")
  );
  return false;
  }

  function send_sq2(){
    var user_id = $('#cus_id_js2').val();
    var key_sq = $('#key_for_note2').val();
    var store_code_sq = 'SQ_' + $('#store_code2').val();

    $.ajax({
      url: 'js/sq.php',
      method: "POST",
      data: {
        "id": user_id,
        "key_sq": key_sq,
        "store_code_sq": store_code_sq
      }
    }).success(
      alert("Gửi tin nhắn thành công!")
    );
    return false;
    }

    function send_sq3(){
      var user_id = $('#user_id_sq').val();
      var key_sq = $('#key_sq_search').val();
      var store_code_sq = 'SQ_' + $('#store_code3').val();

      $.ajax({
        url: 'js/sq.php',
        method: "POST",
        data: {
          "id": user_id,
          "key_sq": key_sq,
          "store_code_sq": store_code_sq
        }
      }).success(
        alert("Gửi tin nhắn thành công!")
      );
      return false;
      }


function submit_note2(){
  var cus_note_js2 = $('#cus_note_js2').val();
  var target_phone2 = $('#target_phone_for_submiting_note2').val();

  $.ajax({
  type: 'post',
  url: 'js/submit_note2.php',
  data: {
   cus_note_js2:cus_note_js2,
   target_phone2:target_phone2
  },
  success: function (response) {
   //$('#number_sheets2').load(window.location.href + " #wrapper2_for_number_sheet_yellow");
  alert('ok');
  }
  });


  return false;
  }

function submit_note(){
  var cus_note_js = $('#cus_note_js').val();
  var target_phone = $('#target_phone_for_submiting_note').val();

  $.ajax({
  type: 'post',
  url: 'js/submit_note.php',
  data: {
   cus_note_js:cus_note_js,
   target_phone:target_phone
  },
  success: function (response) {
   $('#number_sheets').load(window.location.href + " #wrapper2_for_number_sheet");
  }
  });


  return false;
  }





function phone_search(){
  var phone = $('#phone_test').val();

  $.ajax({
  type: 'post',
  url: 'js/phone_search.php',
  data: {
   phone_test:phone
  },
  success: function (response) {
   $('#search_wrapper_result').html(response);
  }
  });

  return false;
  }

  function note_search_submit(){
    var new_note_search_submit = $('#new_note_search_submit').val();
    var target_phone_for_new_note = $('#target_phone_for_new_note').val();

    $.ajax({
    type: 'post',
    url: 'js/new_note_search_submit.php',
    data: {
     new_note_search_submit: new_note_search_submit,
     target_phone_for_new_note: target_phone_for_new_note
    },
    success: function (response) {
     $('#new_note_search_submit').html(new_note_search_submit);
     alert("Lưu thành công!")
    }
    });
    return false;
    }

  function showYellow(){
    var color = $('#display_yellow').val();
    var choice = $('#selection_for_testing').val();
    var use_this_date = $('#use_this_date').val();
    var end_date = $('#end_date').val();
    $.ajax({
    type: 'post',
    //url: 'inc/number_sheets_yellow.php',
    url: 'js/set_color.php',
    data: {
     color: color,
     choice: choice,
     use_this_date:use_this_date,
     end_date:end_date
    },
    success: function (response) {
      $('#number_sheets2').html(response);

    }
    });
    return false;
  }

  function showBlue(){
    var color = $('#display_blue').val();
    var choice = $('#selection_for_testing').val();
    var use_this_date = $('#use_this_date').val();
    var end_date = $('#end_date').val();
    $.ajax({
    type: 'post',
    url: 'js/set_color.php',
    data: {
     color: color,
     choice:choice,
     use_this_date:use_this_date,
     end_date:end_date
    },
    success: function (response) {
      $('#number_sheets2').html(response);
    }
    });
    return false;
  }

  function showPurple(){
    var color = $('#display_purple').val();
    var choice = $('#selection_for_testing').val();
    var use_this_date = $('#use_this_date').val();
    var end_date = $('#end_date').val();
    $.ajax({
    type: 'post',
    url: 'js/set_color.php',
    data: {
     color: color,
     choice:choice,
     use_this_date:use_this_date,
     end_date:end_date
    },
    success: function (response) {
      $('#number_sheets2').html(response);
    }
    });
    return false;
  }

  function showPink(){
    var color = $('#display_pink').val();
    var choice = $('#selection_for_testing').val();
    var use_this_date = $('#use_this_date').val();
    var end_date = $('#end_date').val();
    $.ajax({
    type: 'post',
    url: 'js/set_color.php',
    data: {
     color: color,
     choice:choice,
     use_this_date:use_this_date,
     end_date:end_date
    },
    success: function (response) {
      $('#number_sheets2').html(response);
    }
    });
    return false;
  }
