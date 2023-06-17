import toast from 'toastr';
import 'toastr/build/toastr.min.css';
toast.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": true,
    "positionClass": "toast-top-center",
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
        return toast.error('خطایی رخ داده لطفا دوباره تلاش کنید');
    }
    static response(response){
        if (response.data.status){
            return Notification.success(response.data.message);
        }else{
            return Notification.error(response.data.message);
        }
    }

    static swal(that,text,icon='error',title = 'Oops ..'){
        return that.$swal.fire({
            icon: icon,
            title: title,
            text: text,
        });
    }

    static swal_response(that,response){
        that.$swal.fire({
            icon: (response.data.status)?'success':'error',
            title: (response.data.status)?'success':'error',
            text: response.data.message,
        });
    }
}
export default Notification;
