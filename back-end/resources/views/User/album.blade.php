@extends('User.layout')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div><a class="text-dark" href="/">Feeds</a></div>
                <div><a class="text-dark" href="/photo">My Photos</a></div>
                <div  class="text-primary"><a href="/album">My Albums</a></div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="add-new">
                    <div><button class="btn btn-success float-right">Add New Photo</button></div>
                </div>
                <hr>
                <div class="myphoto-content">
                    <div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                        <div class="detail-photo">
                            <img src="../images/images.png" />
                        </div>
                    </div>
                </div>
                <div class="pagination">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                          <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-xl-2"></div>
        </div>
    </div>
</section>
@endsection