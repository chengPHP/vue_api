<template>
    <div id="contents" >
        <swiper :options="swiperOption">
            <swiper-slide v-for="(slide, index) in swiperSlides" :key="index">
                <img :src="slide" alt="">
            </swiper-slide>
            <div class="swiper-pagination"  slot="pagination"></div>
            <div class="swiper-button-prev" slot="button-prev"></div>
            <div class="swiper-button-next" slot="button-next"></div>
        </swiper>

        <div class="form-group">
            <input type="text" class="form-control" v-model="search" v-on:input="inputFind" placeholder="搜索">
        </div>
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">用户列表</div>

            <!-- Table -->
            <table class="table" v-if="userList.length>0" >
                <thead>
                    <tr>
                        <th>姓名</th>
                        <th>电话</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item,index) in userList">
                        <td>{{item.name}}</td>
                        <td>{{item.phone}}</td>
                        <td>{{item.email}}</td>
                        <td><router-link tag="button" class="btn btn-info" :to="{path:'/detail', query:{id:item.id}}" >详情</router-link></td>
                    </tr>
                </tbody>

            </table>
            <div v-else >
                <p>暂无数据</p>
            </div>
        </div>
    </div>
</template>

<script>
    import qs from 'qs'
    import Swiper from 'swiper';
    export default{
        name: "contents",
        data(){
            return {
                search: '',
                userList:[],
                swiperOption: {
                    loop: true,
                    speed:600,
                    grabCursor : true,
                    parallax:true,
                    autoplay:true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable :true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                },
                swiperSlides: [
                    '../../static/imgs/11.png',
                    '../../static/imgs/22.png',
                    '../../static/imgs/33.png',
                    '../../static/imgs/44.png',
                    '../../static/imgs/55.png',
                ],
            }
        },
        created(){
            var url = this.HOST+'/user/getdata';
            this.$axios.post(url,qs.stringify({
                search:''
            })).then(response=>{
                this.userList = response.data;
            }).catch(error=>{
                console.log(error);
            })

            /*var url = this.HOST+'/user/getdata';
            this.$axios.get(url).then(response=>{
                this.userList = response.data;
            }).catch(error=>{
                console.log(error);
            })*/
        },
        methods:{
            inputFind(){
                var url = this.HOST+'/user/getdata';
                this.$axios.post(url,qs.stringify({
                    search:this.search
                })).then(response=>{
                    this.userList = response.data;
                }).catch(error=>{
                    console.log(error);
                })
            }
        }
    };
</script>

<style>
    .swiper-container{
        width:500px;
        margin: 20px auto;
    }
    img{
        /*width:100%;*/
        width:500px;
        /*height:350px;*/
    }
</style>