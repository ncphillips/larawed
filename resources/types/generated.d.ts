declare namespace App.Data {
  export type SharedInertiaData = {
    currentUser: App.Models.User | null;
  };
}
declare namespace App.Models {
  export type Guest = {
    id: number;
    first_name: string;
    last_name: string;
    attending: boolean | null;
    email: string | null;
    created_at: string | null;
    updated_at: string | null;
    invitation_id: number | null;
  };
  export type Invitation = {
    id: number;
    slug: string;
    created_at: string | null;
    updated_at: string | null;
  };
  export type User = {
    id: number;
    name: string;
    email: string;
    email_verified_at: string | null;
    created_at: string | null;
    updated_at: string | null;
    two_factor_secret: string | null;
    two_factor_recovery_codes: string | null;
    two_factor_confirmed_at: string | null;
  };
}
