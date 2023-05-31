@extends('users.layout.master')
@section('master')
<!-- ================ Order Details List ================= -->
<div class="details_home">
    <div class="recentOrders">
        <div class="cardHeader">
            <h2 class="main-header">Weekly Report</h2>
            <a class="btn-info">All</a>
        </div>

        <table>
            <thead>
                <tr>
                    <td class="header">#NO</td>
                    <td class="header">Username</td>
                    <td class="header">Package Name	</td>
                    <td class="header">Package Price</td>
                    <td class="header">Level</td>
                    <td class="header">Date</td>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

                <tr>
                    <td class="title">1</td>
                    <td class="title">Alvi</td>
                    <td class="title">Silver</td>
                    <td class="title">120 $</td>
                    <td class="title">1</td>
                    <td class="title">24 Jul, 2022 12:12pm</td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
@endsection