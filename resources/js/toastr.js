import toastr from 'toastr';

export function useToastr() {
    toastr.options.positionClass = 'toast-bottom-right';
    toastr.options.closeButton = true;
    toastr.options.progressBar = true;
    return toastr;
}
