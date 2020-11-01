<template>
    <app-layout>


            <div class="card bg-white" style="margin-bottom: 20px">
                <div style="padding: 20px; padding-bottom: 0px">
                    <input type="text" placeholder="Search here....." style="padding: 10px; width: 100%; border:1px solid #ccc ">
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>User Name</th>
                            <th>Registered at</th>
                            <th>Plan</th>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://picsum.photos/50" style="border-radius: 50%">
                                    </div>
                                    <div class="col">
                                        Md Shahadat Hossain
                                        <br><span class="text-muted">shahadat@laralink.com</span>
                                    </div>
                                </div> </td>
                            <td>
                                12/12/2020 01:00pm
                                <br><span class="text-muted">1 days ago</span>
                            </td>
                            <td>Free</td>

                        </tr>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://picsum.photos/50" style="border-radius: 50%">
                                    </div>
                                    <div class="col">
                                        Md Shahadat Hossain
                                        <br><span class="text-muted">shahadat@laralink.com</span>
                                    </div>
                                </div> </td>
                            <td>
                                12/12/2020 01:00pm
                                <br><span class="text-muted">1 days ago</span>
                            </td>
                            <td>Paid</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://picsum.photos/50" style="border-radius: 50%">
                                    </div>
                                    <div class="col">
                                        Md Shahadat Hossain
                                        <br><span class="text-muted">shahadat@laralink.com</span>
                                    </div>
                                </div> </td>
                            <td>
                                12/12/2020 01:00pm
                                <br><span class="text-muted">1 days ago</span>
                            </td>
                            <td>Trail</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://picsum.photos/50" style="border-radius: 50%">
                                    </div>
                                    <div class="col">
                                        Md Shahadat Hossain
                                        <br><span class="text-muted">shahadat@laralink.com</span>
                                    </div>
                                </div> </td>
                            <td>
                                12/12/2020 01:00pm
                                <br><span class="text-muted">1 days ago</span>
                            </td>
                            <td>Free</td>
                        </tr>

                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-auto">
                                        <img src="https://picsum.photos/50" style="border-radius: 50%">
                                    </div>
                                    <div class="col">
                                        Md Shahadat Hossain
                                        <br><span class="text-muted">shahadat@laralink.com</span>
                                    </div>
                                </div> </td>
                            <td>
                                12/12/2020 01:00pm
                                <br><span class="text-muted">1 days ago</span>
                            </td>
                            <td>Free</td>
                        </tr>

                    </table>








                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="margin-bottom: 0px">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>



    </app-layout>
</template>

<script>
    import AppLayout from '../../MakeSumo/AppLayout'

    export default {
        components: {
            AppLayout
        },
        data() {
            return {
            }
        }
    }
</script>
