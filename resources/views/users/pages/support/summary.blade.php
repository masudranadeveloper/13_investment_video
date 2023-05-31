@extends('users.layout.master')
@section('master')
<!-- ================ Order Details List ================= -->
<div class="details_home">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2 class="main-header">Support Summary</h2>
            <a class="btn-info">All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td class="header">Sr</td>
                    <td class="header">Subject</td>
                    <td class="header">Message</td>
                    <td class="header">Reply</td>
                    <td class="header">Status</td>
                    <td class="header">Date</td>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Sliver</td>
                    <td class="title">20$</td>
                    <td class="title">1</td>
                    <td class="title"><button class="btn-success">Success</button></td>
                    <td class="title"><button class="btn-info">22 jul, 2022 12:1pm</button></td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection