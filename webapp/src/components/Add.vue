<template>
    <div id="add" >
        <!--<h1>添加用户</h1>-->
        <!--<div class="row" >-->
            <form class="form-horizontal" v-on:submit.prevent="formSubmit">
                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" v-model="name" placeholder="姓名">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">电话</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" v-model="phone" placeholder="电话">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">邮箱</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" v-model="email" placeholder="邮箱">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">学历</label>
                    <div class="col-sm-10">
                        <select class="form-control" v-model="record">
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
                        <input type="text" class="form-control" v-model="university" placeholder="毕业院校">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">职业</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" v-model="occupation" placeholder="职业">
                    </div>
                </div>

                <div class="form-group">
                    <label for="" class="col-sm-2 control-label">个人简介</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" v-model="descr" ></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">添加</button>
                    </div>
                </div>
            </form>
        <!--</div>-->
    </div>
</template>

<script>
    import qs from 'qs'
    export default{
        name: "add",
        data(){
            return {
                name:'',
                phone: '',
                email: '',
                record: '',
                university: '',
                occupation:'',
                descr: ''
            }
        },
        methods:{
            formSubmit(){
                var url = this.HOST+"/user/add";
                this.$axios.post(url,qs.stringify({
                    name:this.name,
                    phone: this.phone,
                    email: this.email,
                    record: this.record,
                    university: this.university,
                    occupation:this.occupation,
                    descr: this.descr
                })).then(response => {
                    if(response.data.code == 1){
                        this.$swal(response.data.message, "","success");
                        this.$router.replace('/');
                    }
                }).catch(error => {
                    console.log(error);
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