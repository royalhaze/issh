import toast from 'toastr';
import 'toastr/build/toastr.min.css'
toast.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};
class Notification{
    static success(message){
        return toast.success(message);
    }
    static error(message){
        return toast.error(message);
    }
    static default_error(){
        return toast.error('Something went wrong. please try again');
    }
    static response(response){
        if (response.data.status){
            return Notification.success(response.data.message);
        }else{
            return Notification.error(response.data.message);
        }
    }

}
export default Notification;
