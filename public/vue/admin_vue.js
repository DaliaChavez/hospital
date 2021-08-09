Vue.prototype.$http = axios.create(
  {
    headers:
      {
        'Content-Type': 'application/json'
      },
    baseURL: '{{URL::to('/')}}'
  }
);

Vue.prototype.$http.interceptors.request.use(
  config =>
  {
    config.headers['Authorization'] = $("#csrf-token").attr("value");
    return config;
  }
);

new Vue({
  el :'#app',
  data :{
    items: [],
    paginate: 15,
    pagination: {
      total: 0,
      per_page: 2,
      from: 1,
      to: 0,
      current_page: 1
    },
    offset: 4,
    formErrors:{},
    formErrorsUpdate:{},
    newItem : {'titulo':'','descripcion':''},
    fillItem : {'titulo':'','id':'','descripcion':''},
	filter: {
		'filtro': '',
		'por':'email'
	}
  },
  computed: {
    isActived: function() {
      return this.pagination.current_page;
    }
  },
  ready: function() {
    this.getVueItems(this.pagination.current_page);
  },
  methods: {
    getVueItems: function() {
      this.$http.get('/medico/getData').then((response) => {
        console.log(response.data);
        if(response.data.length == 0){
          var message = 'No hay Medicos registrados';
          $.notify({
              icon: 'fa fa-warning',
              title: '<strong>Información!</strong>',
              message: message
          },{
              type: 'warning',
              placement: {
                  from: "bottom"
              }
          });
        }else{
          this.$set('items', response.data);
        }
      });
    },

	changePage: function(page){
		this.pagination.current_page = page;
		this.getVueItems(page);

	},
  moreItems: function () {
    this.paginate += 5;
    this.getVueItems();
  },
	filtro: function() {
		if (this.filter.filtro == null || this.filter.filtro == "") {
			this.changePage(this.pagination.current_page);
		}else{
			var filtro = this.filter;
			this.$http.post('/medico/getDataFilter',filtro).then((response) => {
        console.log(response.data);
        if(response.data.length == 0){
          var message = 'No hay Medicos registrados con estos caracteres';
          $.notify({
              icon: 'fa fa-warning',
              title: '<strong>Información!</strong>',
              message: message
          },{
            type: 'warning',
              placement: {
                  from: "bottom"
              }
          });
          this.$set('items', response.data);
        }else{
				  this.$set('items', response.data);
        }
			});
		}
   }

 }
});
