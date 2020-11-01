<template>
    <app-layout>

        <div class="card bg-white" style="margin-bottom: 20px">


            <div class="card-body">

                <form class="form-horizontal" action="/action_page.php">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="text">Mailing list:</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>Makesumo Launce Notification</option>
                                <option>Makesumo Launce Notification</option>
                                <option>Makesumo Launce Notification</option>
                                <option>Makesumo Launce Notification</option>
                                <option>Makesumo Launce Notification</option>
                                <option>Makesumo Launce Notification</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" for="text">Subject:</label>
                        <div class="col-sm-10">
                            <input id="subject" type="text" name="subject" class="form-control" placeholder="Enter email subject">
                        </div>
                    </div>




                    <div class="form-group">
                        <label class="control-label col-sm-2" for="text">Body:</label>
                        <div class="col-sm-10">
                            <textarea id="subject" type="text" name="subject" class="form-control" placeholder="Your message body here" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Setup</button>
                        </div>
                    </div>
                </form>

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
