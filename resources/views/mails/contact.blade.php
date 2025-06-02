<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #ffffff; border: 1px solid #ddd; border-radius: 8px; padding: 20px;">
        <h2 style="color: #2c3e50; border-bottom: 1px solid #e0e0e0; padding-bottom: 10px;">Thông tin liên hệ mới</h2>

        <p><strong style="color: #34495e;">Họ tên:</strong> {{ $contact->name }}</p>
        <p><strong style="color: #34495e;">Email:</strong> {{ $contact->email }}</p>
        @if (!empty($contact->phone))
            <p><strong style="color: #34495e;">Số điện thoại:</strong> {{ $contact->phone }}</p>
        @endif
        <p><strong style="color: #34495e;">Chủ đề:</strong> {{ $contact->subject }}</p>
        <p>
            <strong style="color: #34495e;">Nội dung:</strong><br>
            <span style="white-space: pre-line;">{{ $contact->message }}</span>
        </p>
    </div>
</div>
