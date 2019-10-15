function reset_all(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    reset_all:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function reset_num(){
  var reset_num = true;
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    reset_num:reset_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_f2_5(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_f2_5:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_abit_5(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_abit_5:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_3_2(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_3_2:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_3_new(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_3_new:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_3_abit(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_3_abit:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_2_new_1_abit(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_2_new_1_abit:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_1_new_2_abit(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_1_new_2_abit:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_7_new_3_abit(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_7_new_3_abit:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_1_new_2_test(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_1_new_2_test:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_2_new_1_test(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_2_new_1_test:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_3_new_2_test(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_3_new_2_test:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_test_3(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_test_3:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function activate_test_5(){
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    activate_test_5:true
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });
  return false;
}

function add_bonus(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');

  }
  });

  return false;
}

function add_bonus_abit(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num_abit: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}

function add_bonus_test(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num_test: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}

function add_bonus_test_knm(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num_test: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}

function add_bonus_test_gls(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num_test_gls: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}


function add_bonus_combo(){
  var target_emp = $('#target_empCode_js').val();
  var bonus_num = $('#bonus_num').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    bonus_num_combo: bonus_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}

function no_more_num(){
  var target_emp = $('#target_empCode_js').val();
  var no_more_num = true;

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_emp: target_emp,
    no_more_num: no_more_num
  },
  success: function (response) {
    $('#one').load(' #emp_manage');
  }
  });

  return false;
}

function check_num(){
  var check_value = $('#check_num_text_area').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    check_value: check_value
  },
  success: function (response) {
    $('#check_results').text(response);
    $('#check_results').css('visibility','visible');
  }
  });

  return false;
}

function check_num2(){
  var sq_area = $('#sq_area').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    sq_area: sq_area
  },
  success: function (response) {
    alert('ok')
  }
  });

  return false;
}

function import_abit(){
  var abit_nums = $('#abit_nums').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    abit_nums: abit_nums
  },
  success: function (response) {
    alert('Kiểm tra lại 1l nha, đặc biệt là Giang óc!');
    $('#four').load(' #import_num_container');
  }
  });

  return false;
}

function import_combo(){
  var combo_nums = $('#combo_nums').val();
  var page_no = $('#page_no_combo').val();
  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    combo_nums: combo_nums,
    page_no:page_no
  },
  success: function (response) {
    alert('Kiểm tra lại 1l nha, đặc biệt là Giang óc!');
    $('#four').load(' #import_num_container');
  }
  });

  return false;
}

function import_new(){
  var new_nums = $('#new_nums').val();
  var page_no = $('#page_no').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    new_nums: new_nums,
    page_no: page_no
  },
  success: function (response) {
    alert('Kiểm tra lại 1l nha, đặc biệt là Giang óc!');
    $('#four').load(' #import_num_container');
  }
  });

  return false;
}

function show_history(){
  var date_for_history = $('#date_for_history').val();


  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    date_for_history: date_for_history
  },
  success: function (response) {
    //alert(date_for_history);
    var _html = $('<div>' + response + '</div>');
    _html.find('link[rel=stylesheet]').remove();
    response = _html.html();
    $('#history_content').html(response);
  }
  });

  return false;
}

function check_note(){
  var target_empCode_for_checking = $('#target_empCode_for_checking').val();
  var date_for_checking = $('#date_for_history').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
    target_empCode_for_checking: target_empCode_for_checking,
    date_for_checking: date_for_checking
  },
  success: function (response) {
    var _html = $('<div>' + response + '</div>');
    _html.find('link[rel=stylesheet]').remove();
    response = _html.html();
    $('#check_results_for_note').html(response);

  }
  });

  return false;
}

function phone_search_for_admin(){
  var phone_search_admin = $('#phone_test_admin').val();

  $.ajax({
  type: 'post',
  url: 'js/manage_num_admin.php',
  data: {
   phone_search_admin:phone_search_admin
  },
  success: function (response) {
    var _html = $('<div>' + response + '</div>');
    _html.find('link[rel=stylesheet]').remove();
    response = _html.html();
   $('#search_wrapper_result_for_admin').html(response);
  }
  });

  return false;
  }

  function send_num(){
    var target_empCode_for_transfering = $('#target_empCode_for_transfering').val();
    var target_phone_for_transfering = $('#target_phone_for_transfering').val();

    $.ajax({
    type: 'post',
    url: 'js/transfer_num.php',
    data: {
     target_empCode_for_transfering: target_empCode_for_transfering,
     target_phone_for_transfering: target_phone_for_transfering
    },
    success: function (response) {
      alert("ok!")
    }
    });

    return false;
    }

    function create_test_yellow(){
      var start_date = $('#start_date').val();

      $.ajax({
      type: 'post',
      url: 'js/manage_num_admin.php',
      data: {
       start_date: start_date,
       create_test_yellow:true
      },
      success: function (response) {
        $('#myModal').modal('hide');
        setTimeout(
          function() {
            $('#four').load(' #import_num_container');
          }, 300);
      }
    });
}

  function create_test_knm(){
      var start_date = $('#start_date').val();

      $.ajax({
      type: 'post',
      url: 'js/manage_num_admin.php',
      data: {
        create_test_knm:true,
       start_date: start_date
      },
      success: function (response) {
        $('#myModal_knm').modal('hide');
        setTimeout(
          function() {
            $('#four').load(' #import_num_container');
          }, 300);
      }
    });
  }

  function create_test_gls(){
      var start_date = $('#start_date').val();

      $.ajax({
      type: 'post',
      url: 'js/manage_num_admin.php',
      data: {
        create_test_gls:true,
       start_date: start_date
      },
      success: function (response) {
        $('#myModal_gls').modal('hide');
        setTimeout(
          function() {
            $('#four').load(' #import_num_container');
          }, 300);
      }
    });
  }

  function register(){
      var userID = $('#userID').val();
      var password = $('#password').val();
      var name = $('#name').val();
      var phone = $('#phone').val();
      var sale_group = $('#sale_group').val();
      var store_code = $('#store_code').val();
      var auth_level = $('#auth_level').val();
      var empCode = store_code + phone;
      $.ajax({
      type: 'post',
      url: 'js/manage_num_admin.php',
      data: {
        register:true,
        userID: userID,
         password: password,
         name: name,
         phone: phone,
        sale_group: sale_group,
        store_code: store_code,
        auth_level: auth_level,
        empCode: empCode
      },
      success: function (response) {
        alert("ok!");
        $('input[type="text"], input[type="number"]').val('');
      }
    });
    return false;
  }
