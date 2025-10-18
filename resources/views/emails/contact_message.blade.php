<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Message</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', sans-serif; color: #111827; }
        .container { max-width: 640px; margin: 0 auto; padding: 24px; background: #ffffff; border: 1px solid #e5e7eb; border-radius: 12px; }
        .heading { font-size: 18px; font-weight: 700; color: #111827; margin: 0 0 12px; }
        .section { margin-bottom: 16px; }
        .label { font-size: 12px; color: #6b7280; margin-bottom: 4px; text-transform: uppercase; letter-spacing: .04em; }
        .value { font-size: 14px; color: #111827; }
        .divider { height: 1px; background: #e5e7eb; margin: 16px 0; }
        .footer { font-size: 12px; color: #6b7280; text-align: center; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">New Contact Message</h1>

        <div class="section">
            <div class="label">Name</div>
            <div class="value">{{ $data['name'] ?? 'N/A' }}</div>
        </div>

        <div class="section">
            <div class="label">Email</div>
            <div class="value">{{ $data['email'] ?? 'N/A' }}</div>
        </div>

        @if(!empty($data['phone']))
        <div class="section">
            <div class="label">Phone</div>
            <div class="value">{{ $data['phone'] }}</div>
        </div>
        @endif

        <div class="section">
            <div class="label">Subject</div>
            <div class="value">{{ $data['subject'] ?? 'N/A' }}</div>
        </div>

        <div class="divider"></div>

        <div class="section">
            <div class="label">Message</div>
            <div class="value">{!! nl2br(e($data['message'] ?? '')) !!}</div>
        </div>

        <div class="footer">
            This message was sent from the website contact form.
        </div>
    </div>
</body>
</html>