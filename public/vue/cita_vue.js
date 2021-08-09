Vue.http.headers.common['X-CSRF-TOKEN'] = $("#csrf-token").attr("value");

new Vue({
  el :'#app',
  data :{
    area: '',
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
		'por':'curp'
	}
  },
  computed: {
    isActived: function() {
      return this.pagination.current_page;
    },
    pagesNumber: function() {
      if (!this.pagination.to) {
        return [];
      }
      var from = this.pagination.current_page - this.offset;
      if (from < 1) {
        from = 1;
      }
      var to = from + (this.offset * 2);
      if (to >= this.pagination.last_page) {
        to = this.pagination.last_page;
      }
      var pagesArray = [];
      while (from <= to) {
        pagesArray.push(from);
        from++;
      }
      return pagesArray;
    }
  },
  ready: function() {
    this.getVueItems(this.pagination.current_page);
  },
  methods: {
    getVueItems: function() {
      this.$http.get('/medico/'+this.paginate+'/getData').then((response) => {
        this.$set('items', response.data.data);
        this.$set('pagination', response.data);
      });
      this.$http.get('/medico/1/area').then((response) => {
        this.$set('area', response.data);
      });
    },
     createItem: function(){
        var input = this.newItem;
        this.$http.post('/local/menc',input).then((response) => {
           this.changePage(this.pagination.current_page);
           this.newItem.titulo      = '';
           this.newItem.descripcion = '';
           $("#create-item").modal('hide');
           toastr.success('Articulo Creado con Exito.','Mensaje de alerta', {timeOut: 5000});  
        }, (response)=>{
           this.formsErrors = response.data;
        });
     },
   deleteItem: function(item) {
      this.$http.delete('/local/menc/'+item.id).then((response) => {
        this.changePage(this.pagination.current_page);
        toastr.error('Articulo eliminado con exito.', 'Mensaje de alerta', {timeOut: 5000});
      });

    },
       editItem: function(item) {
      this.fillItem.titulo = item.titulo;
      this.fillItem.id = item.id;
      this.fillItem.descripcion = item.descripcion;
      $("#edit-itemcat").modal('show');
    },
	updateItem: function(id) {
		var input = this.fillItem;
		this.$http.put('/local/menc/'+id,input).then((response) => {
			this.changePage(this.pagination.current_page);
			this.newItem = {'titulo':'','descripcion':'','id':''};
			$("#edit-itemcat").modal('hide');
			toastr.success('Categoría actualizado con exito', 'Mensaje de alerta', {timeOut: 5000});
		}, (response) => {
			this.formErrors = response.data;
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
			this.$http.post('/medico/findData',filtro).then((response) => {
				this.$set('items', response.data.data);
				this.$set('pagination', response.data);
			});
		}
   }

 }
});
