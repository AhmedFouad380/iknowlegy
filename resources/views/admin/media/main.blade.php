
        {{-- HEADER --}}

        <div class="card shadow-sm mb-3 bg-white rounded">
            <div class="row">
                <div class="col-md-2">
                    <div class="card-header">Media Manager</div>
                </div>
                <div class="col-md-10">
                    <nav class="navbar">
                        <form class="form-inline">
                            <input class="form-control mr-sm-2 myInput border border-primary" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </nav>
                </div>
            </div>
        </div>




        {{-- ALl MEDIA --}}
        <div class="card shadow p-3 mb-5 bg-white rounded">

            <div class="card-header">
                <div class="row">
                    <div class="col-md-3">
                        <a href="javascript:void()" onclick="forMediaModal('{{ route('media.create') }}', '@translate(Upload media)')" class="btn btn-primary ml-2">Upload Media <i class="fa fa-cloud-upload ml-2" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-9 text-right">

                        <a href="#!" data-url="{{ route('media.filter', 'all') }}" data-value="all" onclick="filterMedia(this)" class="all_media p-3">All Media</a>
                        @if (Auth::guard('admin')->check())
                        <a href="#!" data-url="{{ route('media.filter', 'category') }}" data-value="category" onclick="filterMedia(this)" class="category_media p-3">Category</a>
                        <a href="#!" data-url="{{ route('media.filter', 'slider') }}" data-value="slider" onclick="filterMedia(this)" class="slider_media p-3">Slider</a>
                        <a href="#!" data-url="{{ route('media.filter', 'organization') }}" data-value="organization" onclick="filterMedia(this)" class="organizer_media p-3">Organization</a>
                        <a href="#!" data-url="{{ route('media.filter', 'package') }}" data-value="package" onclick="filterMedia(this)" class="package_media p-3">Package</a>
                        @endif
                        <a href="#!" data-url="{{ route('media.filter', 'source_code') }}" data-value="source_code" onclick="filterMedia(this)" class="source_code_media p-3">Source Code</a>
                        <a href="#!" data-url="{{ route('media.filter', 'thumbnail') }}" data-value="thumbnail" onclick="filterMedia(this)" class="thumbnail_media p-3">Thumbnail</a>
                        <a href="#!" data-url="{{ route('media.filter', 'file') }}" data-value="file" onclick="filterMedia(this)" class="file_media p-3">File</a>

                    </div>
                </div>
            </div>
            <!-- masonary -->
                <div class="container-fluid mt-3 mb-3" id="media_container">
                    <div class="row media_row">
                        @forelse ($medias as $media)

                            <div class="col-md-3 col-sm-6 col-xl-3 shadow rounded mb-3 myMedia">

                                <a href="#!" onclick="forMediaModal('{{ route('media.edit',$media->id) }}', '@translate(Edit Media)')">
                                    <div class="card m-2">
                                        @if ($media->alt == 'image')
                                        <img class="card-img rounded" src="{{ filePath($media->image) }}" alt="{{ $media->alt }}">
                                        @endif
                                        @if ($media->alt == 'pdf')
                                        <img class="card-img rounded w-50 m-auto" src="{{ filePath('pdf.png') }}" alt="{{ $media->alt }}">
                                        @endif
                                        @if ($media->alt == 'zip')
                                        <img class="card-img rounded w-50 m-auto" src="{{ filePath('zip.png') }}" alt="{{ $media->alt }}">
                                        @endif
                                        @if($media->alt == 'video')
                                            <video controls crossorigin playsinline id="player" class="w-100 rounded" src="{{ filePath($media->image)  }}"></video>
                                        @endif
                                        <span class="text-center text-dark mt-2">{{ $media->title }}</span>
                                    </div>
                                </a>





                            </div>

                        @empty

                            <div class="col-12 text-center">
                               <img src="{{ filePath('media-not-found.jpg') }}" class="img-fluid w-100" alt="#media not found">
                            </div>

                        @endforelse
                    </div>
                </div>
            <!-- masonary:END -->
        </div>
        {{-- ALl MEDIA::END --}}

        <div class="modal fade custom-modal" id="show-media-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title">New message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body shadow" id="show-media-form">
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/css/dropify.min.css" integrity="sha512-XS4z2x4/njM0ACHTf0QRI/mgWzv2/B4wxD/7JDoUeBvHDhdhFiE7Z3hzevia3pbyr16ufKB6/NUyQ/hBGEAMDw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.1.3/js/dropify.min.js" integrity="sha512-wxJL2RnxGAn2d92YTYdRLjrgIW5fAlhVnnq35EAU7Mmkg4v93cOiPxX/RpG1CCHpoSr6VNcx++6CgQ3B3FoD9Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
        $(document).ready(function(){
      $(".myInput").on("keyup", function() {
	var value = $(this).val().toLowerCase();
	$(".myMedia").filter(function() {
	  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
	});
      });
    });
    </script>

        <script>
            $(document).ready(function(){

                "use strict"

                try {
                    $.post('{{ route('media.slide') }}', {_token:'{{ csrf_token() }}'}, function(data){
                        $('#master_media_section').html(data);
                    });
                } catch (error) {
                    location.reload();
                }


            });

            $('.dropify').dropify();

            $('#datetimepicker1').datetimepicker();

        </script>

        <script>

            function forMediaModal(url, message) {

                $('#show-media-modal').modal('show');
                $('#title').text(message);
                $('#show-media-form').load(url);
                $('body').on('shown.bs.modal', '.modal', function () {
                    $(this).find('select').each(function () {
                        var dropdownParent = $(document.body);
                        if ($(this).parents('.modal.in:first').length !== 0)
                            dropdownParent = $(this).parents('.modal.in:first');
                        $(this).select2({
                            dropdownParent: dropdownParent
                        });
                    });
                });
            }

            function filterMedia(media) {
                var domain_name = $('#domain_name').val();
                var url = $(media).data('url');
                var type = $(media).data('value');

                // ajax setup

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // ajax setup request start

                $.ajax({
                    type: 'get',
                    url: url,
                    data: {
                        type: type
                    },
                    success: function (data) {
                        $('.media_row').html(data);
                    }
                });
            }
            function btnLoader() {

                var type = $('.type').val();
                var image = $('.media-img').val();
                var typeLenth = type.length;
                var imageLenth = image.length;

                if (typeLenth == '' || typeLenth == 'undefined' || typeLenth == 0 || imageLenth == '' || imageLenth == 'undefined' || imageLenth == 0) {
                    $('.Error').text('This field is required');
                } else {
                    $('#media-form').submit();

                    $('.media-btn-submit').addClass('disabled');
                    $('.submit-loader').removeClass('d-none');

                    var curProg = 0;
                    var interval = setInterval(function () {
                        curProg = curProg + 100;
                        $('.progBar').css('width', curProg + '%');
                        $('.progBar').text(curProg - 100 + '%');
                        if (curProg > 100) clearInterval(interval);
                    }, 50);
                }
            }

        </script>
