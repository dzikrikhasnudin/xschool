$(document).ready(function () {
    $('#loader').fadeOut();
    var w = $(window).width();
    if (w > 800) {
        var ii = $('#isisoal').height();
        var h = $(window).height();
        var h = h - $('.cont-soal').position().top - 350;
        $('.cont-soal').css({
            'height': h,
            'overflow': 'auto'
        });

        if (ii > h) {
            $('.cont-soal').css({
                'height': ii,
                'overflow': 'auto'
            });
        }
    }
});
var selected = 1;
var jumlah_soal = 10;
function lihatSoal(nomor) {
    $('.soal-soal').css('display', 'none');
    if (nomor == '') {
        nomor = selected;
    }
    $('#soal-no-' + nomor).css('display', '');
    selected = nomor;
    $('#noSoal').html(nomor);

    if ($('#jawaban-no-' + nomor).hasClass('btn-warning')) {
        $('#c_ragu_ragu').prop('checked', true);
    } else {
        $('#c_ragu_ragu').prop('checked', false);
    }

    for (i = 1; i <= jumlah_soal; i++) {
        var cccc = $('#tmp_answer_' + i).html();
        if (cccc != '') $('#jawaban-no-' + i).addClass('btn-dark');
        var cccc = $('#ragu_answer_' + i).html();
        if (cccc != '') {
            $('#jawaban-no-' + i).addClass('btn-warning');
            $('#jawaban-no-' + i).removeClass('btn-dark');
        }
    }
    //$('.btn-lihat-soal').removeClass('btn-dark');
    $('#jawaban-no-' + nomor).removeClass('btn-warning');
    $('#jawaban-no-' + nomor).removeClass('btn-dark');
    $('.btn-lihat-soal').removeClass('btn-primary');

    $('#jawaban-no-' + nomor).addClass('btn-primary');

    window.scrollTo(0, 0);
    $('.c-svg').fadeOut();
    redrawline(selected);
}

function nextSoal() {
    if (selected < jumlah_soal) {
        selected++;
        lihatSoal(selected);
    } else {

        selesaikanTes();
    }
}

function prevSoal() {
    if (selected > 1) {
        selected--;
        lihatSoal(selected);
    }
}

function raguRagu() {
    if ($('#c_ragu_ragu').is(':checked')) {
        $('#jawaban-no-' + selected).removeClass('btn-outline-dark');
        $('#jawaban-no-' + selected).removeClass('btn-dark');
        $('#jawaban-no-' + selected).addClass('btn-warning');
        $('#ragu_answer_' + selected).html('1');
        save_ragu(selected, '1');
    } else {
        $('#ragu_answer_' + selected).html('');
        $('#jawaban-no-' + selected).removeClass('btn-warning');
        $('#jawaban-no-' + selected).removeClass('btn-outline-dark');
        $('#jawaban-no-' + selected).removeClass('btn-dark');

        if ($('#answer' + selected).html() == '') {
            $('#jawaban-no-' + selected).addClass('btn-outline-dark');
        }
        else {
            $('#jawaban-no-' + selected).addClass('btn-dark');
        }

        save_ragu(selected, '');

    }
}

function trigger_ragu(nomor) {
    if ($('#jawaban-no-' + nomor).hasClass('btn-warning')) {
        $('#c_ragu_ragu').prop('checked', true);
        $('#jawaban-no-' + nomor).removeClass('btn-outline-dark');
        $('#jawaban-no-' + nomor).removeClass('btn-dark');
        $('#jawaban-no-' + nomor).addClass('btn-warning');
    } else {
        $('#c_ragu_ragu').prop('checked', false);
        $('#jawaban-no-' + nomor).removeClass('btn-warning');
        $('#jawaban-no-' + nomor).removeClass('btn-outline-dark');
        $('#jawaban-no-' + nomor).removeClass('btn-dark');

        if ($('#answer' + nomor).html() == '') {
            $('#jawaban-no-' + nomor).addClass('btn-outline-dark');
        }
        else {
            $('#jawaban-no-' + nomor).addClass('btn-dark');
        }
    }

}

lihatSoal('');

function selesaikanTes() {
    $.ajax({
        type: "POST",
        dataType: "html",
        data: $('#formJawaban').serialize(),
        url: "#",
        cache: false,
        beforeSend: function () {
            $('#nextSoal').prop('disabled', true);
            $('#nextSoal').html('Silahkan tunggu ... !');
            $('#loader').fadeIn();
        },
        complete: function () {
        },
        success: function (result) {
            //alert(result);
            if (result == 'error') {
                alert('Oops ada kesalahan! \rSilahkan ulangi !');
                $('#nextSoal').prop('disabled', false);
                $('#nextSoal').prop('enabled', true);
                $('#nextSoal').html('Soal berikutnya');
                $('#loader').fadeOut();
            }
            else
                window.location = result;
        }
    });
}

function changeFont(s, d) {
    $('#isisoal').css("font-size", s + "px");
    $('.cfont').css("font-weight", "normal");
    $('#' + d).css("font-weight", "bold");
}

var RemainTime = new (function () {
    var $countdown;
    var $form;
    var incrementTime = 60;
    var globalTime = 3596 * 1000; // 50 seconds (in milliseconds)
    var currentTime = globalTime;
    var DurationTime = 3596 * 60000; // 5 minutes (in milliseconds)


    $(function () {

        // Setup the timer
        $countdown = $('#countdown');
        RemainTime.Timer = $.timer(updateTimer, incrementTime, true);

    });

    function updateTimer() {

        // Output timer position
        var timeString = formatTime(currentTime);
        $countdown.html(timeString);
        // If timer is complete, trigger alert
        if (currentTime == 0) {
            jQuery.noConflict();
            $('#timeoutDialog').modal();
            //$('#timeoutDialog').modal('show');
            RemainTime.Timer.stop();
            //disable_all();
            //bootbox_timeout();

            return;
        }
        // Increment timer position
        currentTime -= incrementTime;
        if (currentTime < 0) currentTime = 0;

    }
});

// Common functions
function pad(number, length) {
    var str = '' + number;
    while (str.length < length) { str = '0' + str; }
    return str;
}
function formatTime(time) {
    time = time / 10;
    var hour = parseInt(time / 360000),
        min = parseInt(time / 6000) - (hour * 60),
        sec = parseInt(time / 100) - (min * 60) - (hour * 3600),
        hundredths = pad(time - (sec * 100) - (min * 6000) - (hour * 360000), 2);
    return (hour > 0 ? pad(hour, 2) : "00") + ":" + (min > 0 ? pad(min, 2) : "00") + ":" + pad(sec, 2) + "";
}

function KlikJawaban(no, i) {
    $('#pilihan_' + no + '_' + i).trigger('click');
}


function KlikJawaban2(no, i) {
    $('#pilihan_' + '_' + no + '_' + i).trigger('click');
}

function KlikJawaban3(no, i, j) {
    $('#pilihan_' + '_' + no + '_' + i + '_' + j).trigger('click');
}


function pilihan(n, v, i) {
    if (v.toUpperCase() == '')
        $("#answer" + n).html('');
    else {
        $("#answer" + n).html('<i class="fa fa-check"></i>');
        $("#answer" + n).removeClass('d-none');
    }

    $("#tmp_answer_" + n).html(v.toUpperCase());
    //$("#answer"+n).css('color','#000');
    //pushPromise(i,v);
    $("#jawaban-no-" + n).removeClass('btn-outline-dark');
    $("#jawaban-no-" + n).addClass('btn-dark');
    //$("#jawaban-no-"+n).addClass('text-white');
    // $("#cont-answer"+n).css('color','#fff');

    save_answer(n, v.toUpperCase());
    trigger_ragu(selected);

}


function pilihan2(n, v, i) {

    var jawaban = $('.pilihan' + n + ':checked')
        .map(function () { return $(this).val() })
        .get()
        .join(";");

    if (jawaban == '') {
        $("#answer" + n).html('');
        $("#jawaban-no-" + n).removeClass('btn-dark');
        $("#jawaban-no-" + n).addClass('btn-outline-dark');
    }
    else {
        $("#answer" + n).html('<i class="fa fa-check"></i>');
        $("#jawaban-no-" + n).removeClass('btn-outline-dark');
        $("#jawaban-no-" + n).addClass('btn-dark');
        $("#answer" + n).removeClass('d-none');
    }

    $("#tmp_answer_" + n).html(jawaban);

    // $("#answer"+n).css('color','#000');

    // pushPromise(i,jawaban);


    // $("#cont-answer"+n).css('background','#000');
    // $("#cont-answer"+n).css('color','#fff');
    save_answer(n, jawaban);
    trigger_ragu(selected);


}

function pilihan3(n, total, s, arr) {
    var jawaban = '';
    for (i = 1; i <= total; i++) {
        var v = $('input[name="pilihan_' + n + '_' + i + '"]:checked').val();
        if (v != undefined && v != null) jawaban += arr[(i - 1)] + '|' + v + ';';
    }
    jawaban = jawaban.substring(0, jawaban.length - 1);

    if (jawaban == '')
        $("#answer" + n).html('');
    else {
        $("#answer" + n).html('<i class="fa fa-check"></i>');
        $("#answer" + n).removeClass('d-none');
    }

    $("#tmp_answer_" + n).html(jawaban);

    // $("#answer"+n).css('color','#000');
    // pushPromise(s,jawaban);

    $("#jawaban-no-" + n).removeClass('btn-outline-dark');
    $("#jawaban-no-" + n).addClass('btn-dark');

    // $("#cont-answer"+n).css('background','#000');
    // $("#cont-answer"+n).css('color','#fff');
    save_answer(n, jawaban);
    trigger_ragu(selected);

}


function pilih1(no, id, warna, order) {

    // if (window['right_'+no] == '') {
    // $('.m-left-'+no).prop('checked', false);
    // $('.tr-left-'+no).css('background','');
    // }
    //if (window['dipilih1_'+no].indexOf(id) >=0) window['free1_'+no]=false;
    if (window['free1_' + no]) {
        window['free1_' + no] = false;
        $('#r_left_' + no + '_' + id).prop('checked', true);
        $('#row1-' + no + '-' + id).css('background', warna);
        window['pos1_' + no] = $('#r_left_' + no + '_' + id).offset();
        window['pos11_' + no] = $('#r_left_' + no + '_' + id).position();
        window['warna1_' + no] = warna;
        window['id1_' + no] = id;
        window['order1_' + no] = order;
        window['dipilih1_' + no].push(id);
        window['jawab_' + no] = id;
    }

}

function removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax = arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}

function rgb2hex(rgb) {
    rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
    function hex(x) {
        return ("0" + parseInt(x).toString(16)).slice(-2);
    }
    return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
}



function pilih2(no, id, tipe, order, s, ps) {
    var _c_pilih = $('#r_right_' + no + '_' + id).prop('checked');
    if (_c_pilih == true) {
        //alert('1');

        var id1 = window['pasangan_' + no + '_' + id];
        window['free1_' + no] = false;
        //$('#r_left_'+no+'_'+id).prop('checked', true);
        var warna11 = rgb2hex($('#row2-' + no + '-' + id).css('background-color'));
        window['warna1_' + no] = warna11;
        window['pos1_' + no] = $('#r_left_' + no + '_' + id1).offset();
        window['pos11_' + no] = $('#r_left_' + no + '_' + id1).position();
        var cc = id1 + ";" + id + '|';
        var ddd = window['jawaban_' + no];
        dd = ddd.replace(cc, "");
        window['jawaban_' + no] = dd;

        window['id1_' + no] = id1;
        window['free1_' + no] = false;
        window['right_' + no] = '';
        window['free_' + no] = true;
        //delete window['dipilih2_'+no][id];
        //window['dipilih2_'+no].remove(id);
        removeA(window['dipilih2_' + no], id);
        //$('#r_right_'+no+'_'+id).prop('checked', false);
        //$('.line-'+no).css('display','none');
        var xx = '#line_' + no + '_' + window['id1_' + no];
        //alert(xx);
        $(xx).css('display', 'none');
        $('#r_right_' + no + '_' + id).prop('checked', false);
        $('#row2-' + no + '-' + id).css('background', '#ffffff');
    }
    else {
        //alert('2');
        window['free_' + no] = true;
        if (window['dipilih2_' + no].indexOf(id) >= 0) window['free_' + no] = false;
        //alert(2);

        if ((window['id1_' + no] != '') && window['free_' + no] && (window['right_' + no] == '')) {
            //alert(3);
            window['free1_' + no] = true;
            window['right_' + no] = '';
            eval('var pasangan_' + no + '_' + id + '= "";');
            window['pasangan_' + no + '_' + id] = window['id1_' + no];
            window['jawaban_' + no] = window['jawaban_' + no] + window['id1_' + no] + ';' + id + '|';
            window['dipilih2_' + no].push(id);
            $('#r_right_' + no + '_' + id).prop('checked', true);
            $('#row2-' + no + '-' + id).css('background', window['warna1_' + no]);
            $('#r_right_' + no + '_' + id).val(window['id1_' + no] + ';' + id);

            pos2 = $('#r_right_' + no + '_' + id).offset();
            pos22 = $('#r_right_' + no + '_' + id).position();
            $('#svg_' + no + '_' + window['id1_' + no]).css('left', window['pos1_' + no].left);
            $('#line_' + no + '_' + window['id1_' + no]).fadeIn();
            if (window['pos1_' + no].top > pos2.top) {
                $('#line_' + no + '_' + window['id1_' + no])
                    .attr('x1', 0)
                    .attr('y1', window['pos1_' + no].top - pos2.top)
                    .attr('x2', Math.abs(window['pos1_' + no].left - pos2.left) - 20)
                    .attr('y2', 0)
                    .attr('stroke', window['warna1_' + no])
                    ;
                $('#svg_' + no + '_' + window['id1_' + no]).css('top', pos2.top);
                $('#svg_' + no + '_' + window['id1_' + no]).css('left', window['pos1_' + no].left + 20);
                $('#svg_' + no + '_' + window['id1_' + no]).css('height', Math.abs(window['pos1_' + no].top - pos2.top) * 2 + 10);
                $('#svg_' + no + '_' + window['id1_' + no]).css('width', Math.abs(window['pos1_' + no].left - pos2.left) - 20);
            } else {
                $('#line_' + no + '_' + window['id1_' + no])
                    .attr('x1', 0)
                    .attr('y1', 0)
                    .attr('x2', Math.abs(window['pos1_' + no].left - pos2.left) - 20)
                    .attr('y2', Math.abs(window['pos1_' + no].top - pos2.top))
                    .attr('stroke', window['warna1_' + no])
                    ;
                $('#svg_' + no + '_' + window['id1_' + no]).css('top', window['pos1_' + no].top);
                $('#svg_' + no + '_' + window['id1_' + no]).css('left', window['pos1_' + no].left + 20);
                $('#svg_' + no + '_' + window['id1_' + no]).css('height', Math.abs(window['pos1_' + no].top - pos2.top) * 2 + 10);
                $('#svg_' + no + '_' + window['id1_' + no]).css('width', Math.abs(window['pos1_' + no].left - pos2.left) - 20);
            }


            window['id1_' + no] = '';
            jawaban = window['jawaban_' + no];
            n = no;

            if (jawaban == '')
                $("#answer" + n).html('');
            else {
                $("#answer" + n).html('<i class="fa fa-check"></i>');
                $("#answer" + n).removeClass('d-none');
            }

            //$("#answer"+n).css('color','#000');


            $("#tmp_answer_" + n).html(jawaban);
            if (ps == '2') {
                save_answer(n, jawaban);
                //pushPromise(s,jawaban);
            }

            trigger_ragu(selected);

        } else {
            if (tipe == 2)
                $('#r_right_' + no + '_' + id).prop('checked', false);
        }

    }

}

eval('var tipesoal_pencocokan_1 = "1"');
eval('var tipesoal_pencocokan_2 = "1"');
eval('var tipesoal_pencocokan_3 = "3"');
eval('var tipesoal_pencocokan_4 = "1"');
eval('var tipesoal_pencocokan_5 = "1"');
eval('var tipesoal_pencocokan_6 = "1"');
eval('var tipesoal_pencocokan_7 = "1"');
eval('var tipesoal_pencocokan_8 = "1"');
eval('var tipesoal_pencocokan_9 = "1"');
eval('var tipesoal_pencocokan_10 = "1"');

function redrawline(no) {
    var tmp_tipesoal = window['tipesoal_pencocokan_' + no];
    if (tmp_tipesoal == 5) {
        resetKunci(no, '');
        var tmp = $('#tmp_answer_' + no).html();//window['jawaban_pencocokan_'+no];
        var tmp_warna = window['warna_pencocokan_' + no];
        var tmp_soal = window['soal_pencocokan_' + no];
        var arr_tmp = tmp.split('|');
        for (i = 0; i < arr_tmp.length; i++) {
            if (arr_tmp[i].trim() != '') {
                var arr_tmp2 = arr_tmp[i].split(';');
                pilih1(no, arr_tmp2[0], tmp_warna[i], i);
                pilih2(no, arr_tmp2[1], '2', arr_tmp2[1], tmp_soal, '1');
            }
        }

        $('#c-svg-' + no).fadeIn();
    }
}


function resetKunci(no, tipe) {
    left = '';
    window['right_' + no] = '';
    window['warna1_' + no] = '';
    window['id1_' + no] = '';
    window['pos1_' + no] = '';
    window['pos11_' + no] = '';
    window['free1_' + no] = true;
    window['free_' + no] = true;
    window['dipilih1_' + no] = [];
    window['dipilih2_' + no] = [];
    $('.tr-left-' + no).css('background', '');
    $('.tr-right-' + no).css('background', '');
    $('.line-' + no).css('display', 'none');
    window['jawab_' + no] = '';
    window['jawaban_' + no] = '';
    window['order1_' + no] = '';
    $('.m-left-' + no).prop('checked', false);
    $('.m-right-' + no).prop('checked', false);
    if (tipe == '1') $("#tmp_answer_" + no).html('');
    $("#answer" + no).html('');
    $("#jawaban-no-" + no).removeClass('btn-dark');
    $("#jawaban-no-" + no).addClass('btn-outline-dark');

};


$('.jawaban_essai').focusout(function () {
    var no = this.title;
    var jawaban = $('#jawaban_essai_' + no).val();
    var s = $('#jawaban_essai_' + no).attr('pre');


    if (jawaban == '')
        $("#answer" + no).html('');
    else {
        $("#answer" + no).html('<i class="fa fa-check"></i>');
        $("#answer" + no).removeClass('d-none');
    }

    $("#tmp_answer_" + no).html(jawaban);

    save_answer(no, jawaban);
    trigger_ragu(selected);

}).blur(function () { });


function methodThatReturnsAPromise(i, jawaban) {
    return new Promise((resolve, reject) => {
        $.post("#", { nomor: i, jawaban: jawaban, }, function (data) { resolve(); });
    });
}

var promises = [Promise.resolve()];

function pushPromise(i, jawaban) {
    promises.push(promises.pop().then(function () {
        return methodThatReturnsAPromise(i, jawaban)
    }));
}

function save_ragu(nomor, jawaban) {
    $.post("#", { nomor: nomor, jawaban: jawaban, }, function (data) { });
}

function save_answer(nomor, jawaban) {
    pushPromise(nomor, jawaban);
}