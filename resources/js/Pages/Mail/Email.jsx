import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm } from '@inertiajs/react';

export default function Email({status}) {
    const { data, setData, post, processing, errors, reset } = useForm({
        subject: '',
        to: '',
        body: '',
    });

    useEffect(() => {
        return () => {
            reset('subject', 'to', 'body');
        };
    }, []);

    const submit = (e) => {
        e.preventDefault();

        post(route('email.send'));

        reset('subject', 'to', 'body');
    };

    return (
        <GuestLayout>
            <Head title="Mail" />

            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form onSubmit={submit}>
                <div>
                    <InputLabel htmlFor="subject" value="Subject" />

                    <TextInput
                        id="subject"
                        name="subject"
                        value={data.subject}
                        className="mt-1 block w-full"
                        autoComplete="subject"
                        isFocused={true}
                        onChange={(e) => setData('subject', e.target.value)}
                        required
                    />

                    <InputError message={errors.subject} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="to" value="To" />

                    <TextInput
                        id="to"
                        type="email"
                        name="to"
                        value={data.to}
                        className="mt-1 block w-full"
                        autoComplete="to"
                        onChange={(e) => setData('to', e.target.value)}
                        required
                    />

                    <InputError message={errors.to} className="mt-2" />
                </div>

                <div className="mt-4">
                    <InputLabel htmlFor="body" value="Body" />

                    <TextInput
                        id="body"
                        type="text"
                        name="body"
                        value={data.body}
                        className="mt-1 block w-full"
                        onChange={(e) => setData('body', e.target.value)}
                        required
                    />

                    <InputError message={errors.body} className="mt-2" />
                </div>

                <div className="flex items-center justify-end mt-4">
                    
                    <PrimaryButton className="ms-4" disabled={processing}>
                        Send
                    </PrimaryButton>
                </div>
            </form>
        </GuestLayout>
    );
}