@extends('layouts.app')

@section('htmlheader_title')
    Post View
@endsection

@section('contentheader_title')
    Post View
@endsection

@section('main-content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="{{ url('post') }}" class="btn btn-primary btn-block btn-flat">Add a new Record</a></br>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
							<tr>
								<th>Post Name</th>								
								<th>Grade Pay</th>
								<th>Total Post</th>
								<th>Pay Scale</th>
								<th>Status</th>
								<th>Redesignation</th>
							</tr>
							@foreach ($posts as $post)
							<tr>
								<td>{{ $post->fld_PostName }}</td>								
								<td>{{ $post->fld_GradePay }}</td>								
								<td>{{ $post->fld_TotalPost }}</td>
								<td>{{ $post->fld_PayScale_lower_limit }} - {{ $post->fld_PayScale_uper_limit }}</td>
								<?php if($post->fld_Status == 1) { ?>
								<td>Active</td>
								<?php } else { ?>
								<td>Inactive</td>
								<?php } ?>								
								<td><a href="post_redesignation/{{ $post-> fld_PostID }}"><span class="label label-primary">Redesignation</a></span></td>
							</tr>
							@endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
@endsection
@section('scripts-extra')
{{--<script>--}}
    {{--$('.btn-danger').on('click', function() {--}}
        {{--swal(--}}
                {{--'Good job!',--}}
                {{--'You clicked the button!',--}}
                {{--'success'--}}
        {{--)--}}
    {{--});--}}
{{--</script>--}}
@endsection