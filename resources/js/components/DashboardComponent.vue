<template>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Statistics cards & Revenue Growth Chart -->
            <div class="col-md-6 col-lg-6 col-xl-4 col-xl-4 mb-4">
                <div class="row">
                    <!-- Statistics Cards -->
                    <div class="col-6 col-md-3 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="avatar mx-auto mb-2">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-chip fs-4"></i></span>
                                </div>
                                <span class="d-block text-nowrap pt-1">CPU</span>
                                <h2 class="mb-n3">{{ system.cpu + '%' }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="avatar mx-auto mb-2">
                                    <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-memory-card fs-4"></i></span>
                                </div>
                                <span class="d-block text-nowrap pt-1">MEM</span>
                                <h2 class="mb-n3">{{ system.mem.percent + '%'}}</h2>
                            </div>
                        </div>
                    </div>
                    <!--/ Statistics Cards -->
                    <div class="col-6 col-md-3 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="avatar mx-auto mb-2">
                                    <span class="avatar-initial rounded-circle bg-label-primary"><i class="bx bx-hdd fs-4"></i></span>
                                </div>
                                <span class="d-block text-nowrap pt-1">Storage</span>
                                <h2 class="mb-n3">{{ system.disk.percent + '%'}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-3 col-lg-6 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div class="avatar mx-auto mb-2">
                                    <span class="avatar-initial rounded-circle bg-label-warning"><i class="bx bx-location-plus fs-4"></i></span>
                                </div>
                                <span class="d-block text-nowrap pt-1">{{ system.ip.isp }}</span>
                                <h4 class="mb-n3">{{ system.ip.country + '/' + system.ip.city }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics cards & Revenue Growth Chart -->
            <div class="col-md-6 col-lg-6 col-xl-4 col-xl-4 mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between mb-3">
                        <h5 class="card-title mb-0">Bandwidth Usage</h5>

                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bx-upload"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">
                                            Total Upload
                                        </h6>
                                    </div>
                                    <div class="item-progress">
                                        {{ system.net.total_upload }}
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bx-download"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">
                                            Total Download
                                        </h6>
                                    </div>
                                    <div class="item-progress">
                                        {{ system.net.total_download }}
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-danger"><i class="bx bxs-cloud-upload"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">
                                            Outgoing traffic
                                        </h6>
                                    </div>
                                    <div class="item-progress">
                                        {{ system.net.upload }}
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i class="bx bxs-cloud-download"></i></span>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">
                                           Incoming traffic
                                        </h6>
                                    </div>
                                    <div class="item-progress">
                                        {{ system.net.download }}
                                    </div>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
import HttpService from "../services/httpService/HttpService";

export default {
    name: "DashboardComponent",
    data(){
        return {
            system : null
        }
    },
    methods:{
        get_data(){
            HttpService.get('/web-api/dashboard').then(response=>{
                this.system = response.data;
            }).catch(error=>{

            });
        }
    },
    mounted() {
        const that = this;

        setInterval(function (){
            that.get_data();
        },3000);
    }
}
</script>

<style scoped>

</style>
