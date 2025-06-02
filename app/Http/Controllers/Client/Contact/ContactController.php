<?php

namespace App\Http\Controllers\Client\Contact;

use App\Enums\AlertTypes;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Core\ClientController;
use App\Interfaces\Services\Contact\IContactService;
use App\Jobs\SendContactMailJob;
use App\Models\Contact;
use Exception;
use Illuminate\Http\Request;

class ContactController extends ClientController
{
    protected IContactService $contactService;
    public function __construct(IContactService $contactService) {
        $this->contactService = $contactService;
    }
    public function index(Request $request) {
        $this->setMetadata(__('Liên hệ'), __('Trang liên hệ của Edugarden'), __('Edugarden'));
        return $this->getView('contact.index');
    }

    public function send(Request $request) {
        try {
            $contact = $this->contactService->create($request->all());

            if ($contact instanceof Contact) {
                SendContactMailJob::dispatch($contact);
                return $this->redirectBackWithMessage(
                    __('Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.'),
                    AlertTypes::$success
                );
            }

            return $this->redirectBackWithMessage(
                __('Xin lỗi! Đã có lỗi xảy ra khi gửi thông tin. Vui lòng thử lại sau.'),
                AlertTypes::$error
            );
        } catch (Exception $e) {
            \Log::error('Contact Form Error: ' . $e->getMessage());
            return $this->redirectBackWithMessage(
                __('Hệ thống đang bận. Vui lòng thử lại sau hoặc liên hệ qua số điện thoại.'),
                AlertTypes::$error
            );
        }
    }

}
