@extends('layouts.admin')
@section('title')
    {{$title}}
@endsection

@section('content')
<div id="main-content">
    <!-- Main Content Section with everything -->

    <noscript>
        <!-- Show a notification if the user has disabled javascript -->
        <div class="notification error png_bg">
            <div>
                Javascript is disabled or is not supported by your browser. Please <a
                    href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser
                or <a href="http://www.google.com/support/bin/answer.py?answer=23852"
                    title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface
                properly.
                Download From <a href="http://www.exet.tk">exet.tk</a></div>
        </div>
    </noscript>


    <div class="clear"></div> <!-- End .clear -->

    <div class="content-box">
        <!-- Start Content Box -->

        <div class="content-box-header">

            <h3>House List</h3>

            <ul class="content-box-tabs">
                <li><a href="#tab1" class="default-tab">Table</a></li>
                <!-- href must be unique and match the id of target div -->

            </ul>

            <div class="clear"></div>

        </div> <!-- End .content-box-header -->
<div class="content-box-content">

    <div class="tab-content default-tab" id="tab1">
        <!-- This is the target div. id must match the href of this div's tab -->

        <table>

            <thead>
                <tr>
                    <th><input class="check-all" type="checkbox" /></th>
                    <th>Type of House</th>
                    <th>House Owner</th>
                    <th>Phone Number</th>  
                    <th>House Status</th>
                    <th>Picture</th>
                    <th>Price</th>
                </tr>

            </thead>

            <tfoot>
                <tr>
                    <td colspan="6">

                        <div class="pagination ">
                            <a href="#" title="First Page">&laquo; First</a><a href="#"
                                title="Previous Page">&laquo; Previous</a>
                            <a href="#" class="number current" title="1">1</a>
                            <a href="#" class="number" title="2">2</a>
                            <a href="#" class="number" title="3">3</a>
                            <a href="#" class="number" title="4">4</a>
                            <a href="#" title="Next Page">Next &raquo;</a><a href="#"
                                title="Last Page">Last &raquo;</a>
                        </div> <!-- End .pagination -->
                        <div class="clear"></div>
                    </td>
                </tr>
            </tfoot>

            <tbody>
                @if(!empty($housesList))
                @foreach($housesList as $key => $value)
                <tr>
                    <td><input type="checkbox" /></td>
                    <td><a href="#">{{$value->TypeOfHouse}}</a></td>
                    <td><a href="#" title="title">{{$value->user->UserName}}</a></td>
                    <td>{{$value->user->Phone}}</td>
                    <td>{{$value->HouseStatus}}</td>
                    <td>{{$value->Image}}</td>
                    <td>{{$value->Price}}</td>
                    <td>
                        <!-- Icons -->
                        <a href="#" title="Edit"><img src="../admins/resources/images/icons/pencil.png"
                                alt="Edit" /></a>
                        <a href="#" title="Delete"><img src="../admins/resources/images/icons/cross.png"
                                alt="Delete" /></a>
                        <a href="#" title="Edit Meta"><img
                                src="../admins/resources/images/icons/hammer_screwdriver.png"
                                alt="Edit Meta" /></a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>

        </table>
    </div>
@endsection