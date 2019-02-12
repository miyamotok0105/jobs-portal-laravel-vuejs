
<nav class="navbar navbar-icon-top navbar-expand-lg navbar-dark bg-dark rtl fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">بوابه الوظائـف</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item" style="margin-right:20px;">
              <a class="nav-link" href="{{route('home')}}">
                <i class="fa fa-home"></i>
                الصفحه الرئيسيه
                <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item" style="margin-right:20px;">
              <a class="nav-link" href="{{route('app.categories')}}">
                <i class="fa fa-cube"></i>
                  اصناف الوظائف
                <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item" style="margin-right:20px;">
              <a class="nav-link" href="{{route('app.locations')}}">
                <i class="fa fa-compass"></i>
                   البلدان و المدن
                <span class="sr-only">(current)</span>
                </a>
            </li>

            <li class="nav-item" style="margin-right:20px;">
              <a class="nav-link" target="_blank" href="{{route('dashboard.home.index')}}">
                <i class="fa fa-tachometer-alt"></i>
                لوحه التحكم
                <span class="sr-only">(current)</span>
                </a>
            </li>


          </ul>
        </div>
    </div>
</nav>
