new Vue({
    el:'#code',
    data: {
        checkPoint: {},
        interval: null,
        error: '',
    },
    methods: {
        async getCode() {
            await axios.get('/api/current')
            .then(response=>{
                if(response.status==200) {
                    this.checkPoint = response.data.checkPoint
                }
            })
            .catch((error)=>{
                this.error = error
            })
        },
        stop() {
            clearInterval(this.interval)
            this.code=""
        }
    },
    created() {
        this.getCode()
        this.interval = setInterval(this.getCode, 30000)
    }
})
