@extends('Admin.layoutAdmin')
@section('main')
<section>
    <div class="container-fluid body-index">
        <div class="row content">
            <div class="col-xl-2 content-left">
                <div>Manage Photos</div>
                <div>Manage Albums</div>
                <div class="text-primary">Manage Users</div>
            </div>
            <div class="col-xl-8 div-content">
                <div class="add-new">
                    <div><b>Manage Users</b></div>
                </div>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last Login</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Hieu</th>
                        <td>Mark</td>
                        <td>Otto@gmail.com</td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th>Hieu</th>
                        <td>Mark</td>
                        <td>Otto@gmail.com</td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                      </tr>
                      <tr>
                        <th>Hieu</th>
                        <td>Mark</td>
                        <td>Ottogmail.com</td>
                        <td>
                            <button class="btn btn-success">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
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