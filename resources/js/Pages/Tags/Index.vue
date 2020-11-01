<template>
    <app-layout>
        <div class="card bg-white" style="margin-bottom: 20px">
            <div style="padding: 20px; padding-bottom: 0px">
                <div class="row">
                    <div class="col-auto">
                        <button class="btn btn-primary">Add new tag</button>
                    </div>
                    <div class="col">

                        <input placeholder="Search here...." type="text" class="form-control" aria-label="Text input with dropdown button">
                    </div>
                </div>

            </div>

            <div class="card-body" >
                <table class="table-bordered table">
                    <tr>
                        <th>Tag</th>
                        <th>Icons</th>
                        <th>Illustrations</th>
                        <th>3d Illustrations</th>
                        <th>Mockup</th>
                        <th>Pageviews</th>
                    </tr>
                    <tbody>
                    <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>     <tr>
                        <td>Man</td>
                        <td>20</td>
                        <td>12</td>
                        <td>43</td>
                        <td>10</td>
                        <td>0</td>
                    </tr>
                    </tbody>
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
