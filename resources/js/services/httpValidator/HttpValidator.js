import Notification from "../notification/Toastr";
class ValidateData{
    constructor() {
        this.errors = {};
    }
    is_validation_error(item){
        if (item.status == "422"){
            this.errors = item.data.errors;
            $.each(this.errors ,function (key,value) {
                return Notification.error(value[0]);
            });
        }
    }
}
export default ValidateData;
