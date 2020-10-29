@extends('layouts.app_master_dashboard')
@section('content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Lập hóa đơn bán hàng</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lập hóa đơn bán hàng</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <section class="section">
        <div class="card" style="box-shadow:none; background-color:#F7FAFF;">
            <div class="card-content">
                <div class="card-body" style="padding-left: 0px">
                    <!-- button trigger for  Vertically Centered modal -->
                    <button type="button" class="btn btn-primary block" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Thêm mới 
                    </button>
                    <!-- Vertically Centered modal Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                            role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Thêm mới hóa đơn bán hàng</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i data-feather="x"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <section id="basic-vertical-layouts">
                                        <div class="row match-height">
                                            <div class="col-md-12 col-12">
                                                <div class="card" style="box-shadow:none;">
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form class="form form-vertical">
                                                                <div class="form-body">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="first-name-vertical">Nhân viên pha chế</label>
                                                                                <input type="text" id="first-name-vertical" class="form-control" name="bartender"
                                                                                    placeholder="Nhân viên pha chế">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="email-id-vertical">Chọn đồ uồng</label>
                                                                                <input type="text" id="email-id-vertical" class="form-control" name="email-id"
                                                                                    placeholder="Chọn đồ uống">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="contact-info-vertical">Mobile</label>
                                                                                <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                                                                                    placeholder="Mobile">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <label for="password-vertical">Password</label>
                                                                                <input type="password" id="password-vertical" class="form-control" name="contact"
                                                                                    placeholder="Password">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                    </button>
                                    <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Accept</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Graiden</td>
                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                            <td>076 4820 8838</td>
                            <td>Offenburg</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Dale</td>
                            <td>fringilla.euismod.enim@quam.ca</td>
                            <td>0500 527693</td>
                            <td>New Quay</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Nathaniel</td>
                            <td>mi.Duis@diam.edu</td>
                            <td>(012165) 76278</td>
                            <td>Grumo Appula</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Darius</td>
                            <td>velit@nec.com</td>
                            <td>0309 690 7871</td>
                            <td>Ways</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Oleg</td>
                            <td>rhoncus.id@Aliquamauctorvelit.net</td>
                            <td>0500 441046</td>
                            <td>Rossignol</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kermit</td>
                            <td>diam.Sed.diam@anteVivamusnon.org</td>
                            <td>(01653) 27844</td>
                            <td>Patna</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Jermaine</td>
                            <td>sodales@nuncsit.org</td>
                            <td>0800 528324</td>
                            <td>Mold</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Ferdinand</td>
                            <td>gravida.molestie@tinciduntadipiscing.org</td>
                            <td>(016977) 4107</td>
                            <td>Marlborough</td>
                            <td>
                                <span class="badge bg-danger">Inactive</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kuame</td>
                            <td>Quisque.purus@mauris.org</td>
                            <td>(0151) 561 8896</td>
                            <td>Tresigallo</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Deacon</td>
                            <td>Duis.a.mi@sociisnatoquepenatibus.com</td>
                            <td>07740 599321</td>
                            <td>Karapınar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Channing</td>
                            <td>tempor.bibendum.Donec@ornarelectusante.ca</td>
                            <td>0845 46 49</td>
                            <td>Warrnambool</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Aladdin</td>
                            <td>sem.ut@pellentesqueafacilisis.ca</td>
                            <td>0800 1111</td>
                            <td>Bothey</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Cruz</td>
                            <td>non@quisturpisvitae.ca</td>
                            <td>07624 944915</td>
                            <td>Shikarpur</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Keegan</td>
                            <td>molestie.dapibus@condimentumDonecat.edu</td>
                            <td>0800 200103</td>
                            <td>Assen</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Ray</td>
                            <td>placerat.eget@sagittislobortis.edu</td>
                            <td>(0112) 896 6829</td>
                            <td>Hofors</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Maxwell</td>
                            <td>diam@dapibus.org</td>
                            <td>0334 836 4028</td>
                            <td>Thane</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Carter</td>
                            <td>urna.justo.faucibus@orci.com</td>
                            <td>07079 826350</td>
                            <td>Biez</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Stone</td>
                            <td>velit.Aliquam.nisl@sitametrisus.com</td>
                            <td>0800 1111</td>
                            <td>Olivar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Berk</td>
                            <td>fringilla.porttitor.vulputate@taciti.edu</td>
                            <td>(0101) 043 2822</td>
                            <td>Sanquhar</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Philip</td>
                            <td>turpis@euenimEtiam.org</td>
                            <td>0500 571108</td>
                            <td>Okara</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Kibo</td>
                            <td>feugiat@urnajustofaucibus.co.uk</td>
                            <td>07624 682306</td>
                            <td>La Cisterna</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Bruno</td>
                            <td>elit.Etiam.laoreet@luctuslobortisClass.edu</td>
                            <td>07624 869434</td>
                            <td>Rocca d'Arce</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Leonard</td>
                            <td>blandit.enim.consequat@mollislectuspede.net</td>
                            <td>0800 1111</td>
                            <td>Lobbes</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Hamilton</td>
                            <td>mauris@diam.org</td>
                            <td>0800 256 8788</td>
                            <td>Sanzeno</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Harding</td>
                            <td>Lorem.ipsum.dolor@etnetuset.com</td>
                            <td>0800 1111</td>
                            <td>Obaix</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                        <tr>
                            <td>Emmanuel</td>
                            <td>eget.lacus.Mauris@feugiatSednec.org</td>
                            <td>(016977) 8208</td>
                            <td>Saint-Remy-Geest</td>
                            <td>
                                <span class="badge bg-success">Active</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@stop