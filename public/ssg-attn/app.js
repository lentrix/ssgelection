new Vue({
    el:'#code',
    data: {
        checkPoint: {},
        interval: null
    },
    methods: {
        async getCode() {
            await axios.get('http://localhost:8000/api/current')
            .then(response=>{
                if(response.status==200) {
                    this.checkPoint = response.data.checkPoint
                }
            })
            .catch(error=>{
                console.log(error)
            })
        },
        stop() {
            clearInterval(this.interval)
            this.code=""
        }
    },
    created() {
        this.getCode()
        this.interval = setInterval(this.getCode, 60000)
    }
})