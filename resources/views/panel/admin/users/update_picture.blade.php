@extends('layout.main')

@push('style-section')
@endpush

@section('title')
    Update Picture
@endsection

@section('page_title')
    Update Picture
@endsection

@section('body')

    {{--Start Content--}}
    <div class="section-wrapper">
        <div class="mg-t-40">

            <form method="post" action="{{route('admin.user.update.profile.pic', encrypt($user->id))}}" enctype="multipart/form-data">
                @csrf
                <div class="row">

                    <div class="col-lg-12 pd-b-20">
                        <label class="form-control-label">Image</label>
                        <input class="form-control" type="file" accept="image/*"
                               id="imgInp"  name="image">
                        @if($errors->has('image'))
                            <div class="error"
                                 style="color:red">{{$errors->first('image')}}</div>
                        @endif
                        <img style="margin-top:10px; {{isset($user) ? "display: block" : "display: none"}}" width="150" height="150" id="blah" src="{{isset($user->img_url) ? $user->img_url : "#"}}" />
                    </div>
                </div>
                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-primary bd-0"><i class="fa fa-save"></i> Save</button>
                </div>
            </form>

        </div>
    </div>
    {{--End Content--}}
@endsection

@push('script-section')
    <script>
        imgInp.onchange = evt => {
            $("#blah").css("display", "block");
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
