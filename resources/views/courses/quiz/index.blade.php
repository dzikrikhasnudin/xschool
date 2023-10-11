

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-BB3NLM7RX6"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'G-BB3NLM7RX6');
	</script>

	<div class="container-fluid fadeInDown my-2">
		<div class="row">
			<div class="col-sm-12" style="border:0px solid red">
				<div class="text-left pt-3 pb-5 mb-2" id="formContent"
					style="background-size: 300px;background-image: url('#');background-repeat: no-repeat;background-position: top right; ">
					<div class="row row-atas">
						<div class="col-sm-4"><span style="font-size:18px">Soal nomor</span> <span
								style="font-size:20px" id="noSoal">1</span></div>
						<div class="col-sm-8 cont-btn-informasi">
							<button class="btn-informasi btn btn-primary btn-round m" data-toggle="modal"
								data-target="#infoSoal" style="border-radius:30px;font-size:12px;"><i
									class="fa fa-info-circle d-sm-none"></i><span
									class="d-none d-sm-inline-block">INFORMASI SOAL<span></span></span></button>
							<button class="btn-informasi btn  btn-outline-secondary  btn-round"
								style="border-radius:30px;font-size:12px;">Sisa Waktu : <b><span
										id="countdown">00:59:31</span></b></button>
							<button class="btn-informasi btn btn-primary btn-round" data-toggle="modal"
								data-target="#myModal" style="border-radius:30px;font-size:12px"><span
									class="d-none d-sm-inline-block">Daftar Soal </span> <i
									class="fa fa-th-large"></i></button>
						</div>
					</div>
					<div class="row pb-2  row-atas">
						<div class="col-sm-6"><small>Ukuran font soal:</small> <span style="font-size:12px"
								class="ml-2 mr-1 cfont" id="c1" onclick="changeFont('12','c1')">A</span> <span
								style="font-size:16px" class="ml-2 mr-1 cfont" id="c2"
								onclick="changeFont('16','c2')">A</span> <span style="font-size:20px"
								class="ml-2 mr-1 cfont" id="c3" onclick="changeFont('18','c3')">A</span></div>
						<div class="col-sm-6 mt-2 mataujian">
							{{('Subtes')}}</div>
					</div>
					<div class="row pl-3 pr-3 pb-2 mb-1">
						<div class="col" style="border-bottom:1px solid #eee"></div>
					</div>
					<!-- isi soal -->
					<div class="row pl-3 pr-3 pb-2 mb-2">
						<div class="col p-3 " id="isisoal" style="border:2px solid #eee; border-top:10px solid #eee;">
                            @foreach ($quizs as $quiz)
                                <div class="soal-soal row" style="" id="soal-no-{{$quiz->id}}">
								<div class="col-lg-6 cont-soal"
									style="padding-right: 20px; height: 380px; overflow: auto;">
									<!--?xml encoding="utf-8" ?-->
									<p>{{$quiz->soal}}</p><br>
								</div>
								<div class="col-lg-6 " style="border-left:5px dotted #eee;">
									<p>{{$quiz->pertanyaan}}</p> <!-- PG -->
									<table class="table " style="margin-top:0px">
										<tbody>
											<tr>
												<td style="width:20px;border:0px;padding:0px">
													<div class="radio icheck-primary" onclick="KlikJawaban('1.','0');">
														<input id="pilihan_1_0" onchange="pilihan('1','a','11')" pil="a"
															name="pilihan1" type="radio">
														<label for="pilihan_1_0"></label>
													</div>
												</td>
												<td style="padding-top:15px;;border:0px;padding:0px;padding-top:5px"
													onclick="KlikJawaban(1,0);"><!--?xml encoding="utf-8" ?-->
													<p>{{$quiz->pilihan_a}}</p>
												</td>
											</tr>
											<tr>
												<td style="width:20px;border:0px;padding:0px">
													<div class="radio icheck-primary" onclick="KlikJawaban('1.','1');">
														<input id="pilihan_1_1" onchange="pilihan('1','b','11')" pil="b"
															name="pilihan1" type="radio">
														<label for="pilihan_1_1"></label>
													</div>
												</td>
												<td style="padding-top:15px;;border:0px;padding:0px;padding-top:5px"
													onclick="KlikJawaban(1,1);"><!--?xml encoding="utf-8" ?-->
													<p>{{$quiz->pilihan_b}}</p>
												</td>
											</tr>
											<tr>
												<td style="width:20px;border:0px;padding:0px">
													<div class="radio icheck-primary" onclick="KlikJawaban('1.','2');">
														<input id="pilihan_1_2" onchange="pilihan('1','c','11')" pil="c"
															name="pilihan1" type="radio">
														<label for="pilihan_1_2"></label>
													</div>
												</td>
												<td style="padding-top:15px;;border:0px;padding:0px;padding-top:5px"
													onclick="KlikJawaban(1,2);"><!--?xml encoding="utf-8" ?-->
													<p>{{$quiz->pilihan_c}}</p>
												</td>
											</tr>
											<tr>
												<td style="width:20px;border:0px;padding:0px">
													<div class="radio icheck-primary" onclick="KlikJawaban('1.','3');">
														<input id="pilihan_1_3" onchange="pilihan('1','d','11')" pil="d"
															name="pilihan1" type="radio">
														<label for="pilihan_1_3"></label>
													</div>
												</td>
												<td style="padding-top:15px;;border:0px;padding:0px;padding-top:5px"
													onclick="KlikJawaban(1,3);"><!--?xml encoding="utf-8" ?-->
													<p>{{$quiz->pilihan_d}}</p>
												</td>
											</tr>
											<tr>
												<td style="width:20px;border:0px;padding:0px">
													<div class="radio icheck-primary" onclick="KlikJawaban('1.','4');">
														<input id="pilihan_1_4" onchange="pilihan('1','e','11')" pil="e"
															name="pilihan1" type="radio">
														<label for="pilihan_1_4"></label>
													</div>
												</td>
												<td style="padding-top:15px;;border:0px;padding:0px;padding-top:5px"
													onclick="KlikJawaban(1,4);"><!--?xml encoding="utf-8" ?-->
													<p>{{$quiz->pilihan_e}}</p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
                            @endforeach
						</div>
					</div>

					<div class="row pl-3 pr-3 pb-1 mb-0">
						<div class="col" style="border-bottom:1px solid #eee"></div>
					</div>

					<div class="row pb-0 pt-2 mt-2 btn-bawah">
						<div class="col text-center" style="">
							<button class="btn btn-outline-danger btn-round btn-md btn-navigasi"
								style="border-radius:30px;" onclick="prevSoal()"><i
									class="fa fa-chevron-circle-left"></i> <span class="d-none d-sm-inline-block">Soal
									sebelumnya</span></button>
						</div>
						<div class="col text-center" style="">
							<button class="btn btn-outline-warning btn-round btn-md btn-navigasi"
								style="border-radius:30px;"><input type="checkbox" onclick="raguRagu()" id="c_ragu_ragu"
									value=""> <span class="d-none d-sm-inline-block">Ragu-ragu
								</span></button>
						</div>
						<div class="col text-center" style="">
							<button class="btn btn-outline-primary btn-round btn-md btn-navigasi"
								style="border-radius:30px;" onclick="nextSoal()" id="nextSoal"> <span
									class="d-none d-sm-inline-block">Soal berikutnya</span> <i
									class="fa fa-chevron-circle-right"></i></button>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="modal fadeIn" id="myModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header" style="background:#dfe6e9">
					<h5 class="modal-title">Daftar Soal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body text-center pb-5 pt-5">
					<form id="formJawaban">
						<span class="d-none" id="tmp_answer_1"></span>
						<span class="d-none" id="ragu_answer_1"></span>
						<input type="hidden" name="jawaban_no[1]" id="input_jawaban_no_1" value="1">
						<div id="jawaban-no-1"
							class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal btn-primary"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('1')">1
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer1" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_2"></span>
						<span class="d-none" id="ragu_answer_2"></span>
						<input type="hidden" name="jawaban_no[2]" id="input_jawaban_no_2" value="2">
						<div id="jawaban-no-2" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('2')">2
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer2" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_3"></span>
						<span class="d-none" id="ragu_answer_3"></span>
						<input type="hidden" name="jawaban_no[3]" id="input_jawaban_no_3" value="3">
						<div id="jawaban-no-3" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('3')">3
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer3" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_4"></span>
						<span class="d-none" id="ragu_answer_4"></span>
						<input type="hidden" name="jawaban_no[4]" id="input_jawaban_no_4" value="4">
						<div id="jawaban-no-4" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('4')">4
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer4" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_5"></span>
						<span class="d-none" id="ragu_answer_5"></span>
						<input type="hidden" name="jawaban_no[5]" id="input_jawaban_no_5" value="5">
						<div id="jawaban-no-5" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('5')">5
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer5" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_6"></span>
						<span class="d-none" id="ragu_answer_6"></span>
						<input type="hidden" name="jawaban_no[6]" id="input_jawaban_no_6" value="6">
						<div id="jawaban-no-6" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('6')">6
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer6" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_7"></span>
						<span class="d-none" id="ragu_answer_7"></span>
						<input type="hidden" name="jawaban_no[7]" id="input_jawaban_no_7" value="7">
						<div id="jawaban-no-7" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('7')">7
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer7" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_8"></span>
						<span class="d-none" id="ragu_answer_8"></span>
						<input type="hidden" name="jawaban_no[8]" id="input_jawaban_no_8" value="8">
						<div id="jawaban-no-8" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('8')">8
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer8" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_9"></span>
						<span class="d-none" id="ragu_answer_9"></span>
						<input type="hidden" name="jawaban_no[9]" id="input_jawaban_no_9" value="9">
						<div id="jawaban-no-9" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('9')">9
							<div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer9" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<span class="d-none" id="tmp_answer_10"></span>
						<span class="d-none" id="ragu_answer_10"></span>
						<input type="hidden" name="jawaban_no[10]" id="input_jawaban_no_10" value="10">
						<div id="jawaban-no-10" class="btn  btn-outline-dark  btn-sm mb-2 mr-2 btn-lihat-soal"
							style="width:30px;height:30px;padding-top:5px;position:relative" onclick="lihatSoal('10')">
							10 <div class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
								<i class="fa fa-check"></i></div>
							<div id="answer10" class="badge badge-light d-none"
								style="height:15px;width:15px;font-size:9px;border-radius:50%;position:absolute;top:-5px;right:-5px;border:1px solid #000;background:#fff">
							</div>
						</div>

						<br>
					</form>
				</div>

			</div>
		</div>
	</div>

	<div class="modal" id="infoSoal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header" style="background:#dfe6e9">
					<h5 class="modal-title">Informasi Soal</h5>
					<button type="button" class="close" data-dismiss="modal">×</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body text-center pb-5 pt-5">
				</div>

			</div>
		</div>
	</div>

	<div class="modal fadeIn" id="timeoutDialog" role="dialog" data-backdrop="static" data-keyboard="false">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<!-- Modal body -->
				<div class="modal-body text-center pb-2 pt-5">
					<h5 class="modal-title" style="text-align:center">PERHATIAN !!</h5>
					<p>Waktu tes sudah habis !</p>
				</div>
				<div class="modal-footer text-center">
					<button class="btn btn-danger" onclick="selesaikanTes()">Ok, Lanjutkan !</button>
				</div>

			</div>
		</div>
	</div>


	<div class="c-svg" id="c-svg-1" style="display: none;"></div>
	<div class="c-svg" id="c-svg-2" style="display: none;"></div>
	<div class="c-svg" id="c-svg-3" style="display: none;"></div>
	<div class="c-svg" id="c-svg-4" style="display: none;"></div>
	<div class="c-svg" id="c-svg-5" style="display: none;"></div>
	<div class="c-svg" id="c-svg-6" style="display: none;"></div>
	<div class="c-svg" id="c-svg-7" style="display: none;"></div>
	<div class="c-svg" id="c-svg-8" style="display: none;"></div>
	<div class="c-svg" id="c-svg-9" style="display: none;"></div>
	<div class="c-svg" id="c-svg-10" style="display: none;"></div>
	<div style="position: fixed; inset: 0px; background: rgb(255, 255, 255); opacity: 0.5; z-index: 99999; display: none;" id="loader">
		<img class="loader" src="{{asset('assets/img/loader.gif')}}">
	</div>


	<link rel="stylesheet" href="{{asset('assets/quiz/style.css')}}">

	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/timer.jquery/0.9.0/timer.jquery.min.js"></script>
	<script src="{{asset('assets/quiz/script.js')}}"></script>

    
