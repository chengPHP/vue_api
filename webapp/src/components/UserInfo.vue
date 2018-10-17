<template>
    <div id="user-info" >
        <div style="text-align: center" >
            <button class="btn btn-info" @click="getReturn" >返回</button>
            <router-link tag="button" class="btn btn-info" :to="{path:'/edit',query:{id: info.id}}" >编辑</router-link>
            <button @click="deleteUser()" class="btn btn-danger">删除</button>
        </div>


        <form class="form-horizontal" v-on:submit.prevent="formSubmit">
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control" v-model="info.name" placeholder="姓名">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">电话</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control" v-model="info.phone" placeholder="电话">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-10">
                    <input type="email" disabled class="form-control" v-model="info.email" placeholder="邮箱">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">学历</label>
                <div class="col-sm-10">
                    <select class="form-control" v-model="info.record" disabled>
                        <option value="">请选择</option>
                        <option value="高中">高中</option>
                        <option value="专科">专科</option>
                        <option value="本科">本科</option>
                        <option value="硕士">硕士</option>
                        <option value="博士">博士</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">毕业院校</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control" v-model="info.university" placeholder="毕业院校">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">职业</label>
                <div class="col-sm-10">
                    <input type="text" disabled class="form-control" v-model="info.occupation" placeholder="职业">
                </div>
            </div>

            <div class="form-group">
                <label for="" class="col-sm-2 control-label">个人简介</label>
                <div class="col-sm-10">
                    <textarea class="form-control" disabled rows="3" v-model="info.descr"></textarea>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import qs from 'qs'
    export default{
        name: "user-info",
        data(){
            return {
                id: '',
                info:{}
            }
        },
        created(){
           this.id = this.$route.query.id;
           var url = this.HOST+'/user/detail';
           this.$axios.post(url,qs.stringify({
               id: this.id
           }))
           .then(response => {
               this.info = response.data;
           })
           .catch(error => {
               console.log(error);
           })
        },
        methods:{
            getReturn(){
                this.$router.back(-1);
            },
            deleteUser:function(){
                this.$swal({
                    title: "确定删除吗？",
                    text: "你将无法恢复该虚拟文件！",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定删除！",
                    closeOnConfirm: false
                }).then((res) =>{
                    if(res.value){
                        var url = this.HOST+'/user/delete';
                         this.$axios.post(url,qs.stringify({
                         id: this.id
                         }))
                         .then(response => {
                             if(response.data.code == 1){
                                 this.$swal(response.data.message, "","success");
                                 this.$router.replace('/');
                             }
                         })
                         .catch(error => {
                            console.log(error);
                         })
                    }
                });
            }
        }

    };
</script>

<style scoped>
    textarea{
        resize: none;
    }
    .form-horizontal .form-group{
        margin-left: 0;
        margin-right: 0;
    }
</style>