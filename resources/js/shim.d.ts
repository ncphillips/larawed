declare module "@inertiajs/core" {
  import NavData = App.Data.NavData;
  import SharedInertiaData = App.Data.SharedInertiaData;
  import User = App.Models.User;

  export interface PageProps extends SharedInertiaData {
    currentUser?: User;

    [key: string]: unknown;
  }
}
