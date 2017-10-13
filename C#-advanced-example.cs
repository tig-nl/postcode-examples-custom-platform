using System;
using System.Net.Http;
using System.Threading.Tasks;
using System.IO;
using Newtonsoft.Json;

namespace TIG_Postcodeservice
{
    public class Program
    {
        public static void Main(string[] args)
        {
            string client_id = "1014BA";
            string secure_code = "9SRLYBCALURPE2B";

            string postcode = "1014BA";
            int huisnummer = 37;

            TIG_Postcode instance = new TIG_Postcode(client_id, secure_code);

            Task<string> task = instance.search(postcode, huisnummer);

            string result = task.Result;

            Address address = JsonConvert.DeserializeObject<Address>(result);

            Console.WriteLine("Straatnaam: " + address.straatnaam);
            Console.WriteLine("Woonplaats: " + address.woonplaats);
        }
    }

    public class TIG_Postcode
    {
        private string client_id;
        private string secure_code;

        public TIG_Postcode(string client_id, string secure_code)
        {
            this.client_id = client_id;
            this.secure_code = secure_code;
        }

        public async Task<string> search(string postcode, int huisnummer)
        {
            var client = new HttpClient();

            string url = "https://postcode.tig.nl/api/v3/json/getAddress/index.php";
            url += String.Format("?postcode={0}&huisnummer={1}", postcode, huisnummer);
            url += String.Format("&client_id={0}&secure_code={1}", this.client_id, this.secure_code);

            HttpResponseMessage response = await client.PostAsync(url, null);

            HttpContent responseContent = response.Content;

            using (var reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
            {
                return(await reader.ReadToEndAsync());
            }
        }
    }

    public class Address
    {
        public bool success { get; set; }
        public string straatnaam { get; set; }
        public string woonplaats { get; set; }
    }
}