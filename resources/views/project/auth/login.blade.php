@extends('project.layouts.indexs.index')
@push('style')

@endpush
@section('content')
   <section class="login-content">
      <div class="row m-0 align-items-center bg-white vh-100">
         <div class="col-md-6">
            <div class="row justify-content-center">
               <div class="col-md-10">
                  <div class="card card-transparent shadow-none d-flex justify-content-center mb-0 auth-card">
                     <div class="card-body">
                        <a href="{{route('dashboard.index')}}" class="navbar-brand d-flex align-items-center mb-3">
                            @if(isset($settings))
                                <img class="logo" src="{{showFile($settings->logo_header)}}" alt="">
                            @else
                                <svg width="30" class="text-primary" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <rect x="-0.757324" y="19.2427" width="28" height="4" rx="2" transform="rotate(-45 -0.757324 19.2427)" fill="currentColor"/>
                                   <rect x="7.72803" y="27.728" width="28" height="4" rx="2" transform="rotate(-45 7.72803 27.728)" fill="currentColor"/>
                                   <rect x="10.5366" y="16.3945" width="16" height="4" rx="2" transform="rotate(45 10.5366 16.3945)" fill="currentColor"/>
                                   <rect x="10.5562" y="-0.556152" width="28" height="4" rx="2" transform="rotate(45 10.5562 -0.556152)" fill="currentColor"/>
                                </svg>
                            @endif
                           <h4 class="logo-title ms-3">{{@$settings->website_name}}</h4>
                        </a>
                        <h1 class="mb-2 text-center">{{__('auth.welcomeback')}} 👋</h1>

                        <!-- Validation Errors -->
                        <form id="loginForm" method="POST" action="{{ route('admin.login') }}" data-toggle="validator" class="mt-4">
                            {{csrf_field()}}
                           <div class="row">
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="email" class="form-label">{{__('auth.email')}}</label>
                                    <input id="email" type="email" name="email" class="form-control"  placeholder="{{__('auth.placeholderEmail')}}" required autofocus>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="form-group">
                                    <label for="password" class="form-label">{{__('auth.password')}}</label>
                                    <input class="form-control" type="password" placeholder="********"  name="password" required>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="customCheck1" name="rememberme">
                                    <!-- <input type="checkbox" class="custom-control-input" id="customCheck1"> -->
                                    <label class="form-check-label" for="customCheck1">{{__('auth.rememberme')}}</label>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                              </div>
                           </div>
                           <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary">{{__('auth.sign in')}}</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-6 d-md-block d-none bg-primary p-0 mt-n1 vh-100 overflow-hidden">
            <img src="{{asset('admin/images/auth/01.png')}}" class="img-fluid gradient-main animated-scaleX" alt="images">
         </div>
      </div>
   </section>
@endsection

@push('script')
<script type="text/javascript">

    $(document).ready(function () {

        console.clear()
        /*------------------------------------------
        --------------------------------------------
        Submit Event
        --------------------------------------------
        --------------------------------------------*/

        $(document).on("submit", "#loginForm", function (e) {
            e.preventDefault();
            let formObj = $(this);
            formObj.find("[type='submit']").html("{{__('auth.sign in')}}...");
            $.ajax({
                url: formObj.attr('action'),
                data: formObj.serialize(),
                type: "POST",
                dataType: 'json',
                success: function (result) {
                    console.log("success =  200")
                    formObj.find("[type='submit']").html("{{__('auth.sign in')}}");
                    if (result.code === 200) {
                        successToster('{{__("auth.done successfully")}}', result.message);
                        // console.log(result.data.url)
                        window.location.href = result.data.url;
                    } else if (result.code === 401) {
                        warningToster('{{__("auth.an error occurred")}}', result.message)
                    } else {
                        warningToster('{{__("auth.an error occurred")}}', result.message)
                    }
                },
                error: function (errorObj, errorText, errorThrown) {
                    console.log("error =  500")
                    formObj.find("[type='submit']").html("login");
                    if (errorObj.status === 500) {
                        errorToster('{{__("auth.an error occurred")}}', "{{__("auth.code error")}}");
                    } else if (errorObj.status == 422) {
                        let errorsObj = $.parseJSON(errorObj.responseText);
                        let listObject = errorsObj.errors;
                        let testArr = [];
                        $.each(listObject, function (errorKey, errorArr) {
                            $.each(errorArr, function (key, value) {
                                testArr.push(value);
                            });
                        });
                        // console.log(testArr)
                        validToster('{{__("auth.an error occurred")}}', testArr)
                    }

                }
            });
            return false;
        });
    });
</script>
@endpush
